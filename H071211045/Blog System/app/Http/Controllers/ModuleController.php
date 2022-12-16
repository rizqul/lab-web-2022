<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ModuleController extends Controller
{

    public function dashboard()
    {

        // Total Articles
        $totalArticles = Articles::count();

        // Total Views
        $totalVisitors = Articles::sum('visitors');

        // Total Users
        $totalUsers = Users::count();

        // Most Liked Articles
        $mostLikedArticles = Articles::join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.*', 'categories.category_name')
            ->orderBy('likes', 'desc')
            ->limit(3)
            ->get();

        // Most Commented Articles
        $mostCommentedArticles = Articles::join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.*', 'categories.category_name')
            ->orderBy('comments', 'desc')
            ->limit(3)
            ->get();

        // Most Viewed Articles
        $mostViewedArticles = Articles::join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.*', 'categories.category_name')
            ->orderBy('visitors', 'desc')
            ->limit(3)
            ->get();

        

        return view(
            'module.dashboard',
            compact(
                'totalArticles',
                'totalVisitors',
                'totalUsers',
                'mostLikedArticles',
                'mostCommentedArticles',
                'mostViewedArticles'
            )
        );
    }

    /*
     * Articles CMS
     */
    public function articles()
    {
        $articles = Articles::all();

        $categories = Categories::all();

        return view('module.articles', compact('articles', 'categories'));
    }

    public function articleEdit($id)
    {
        $article = Articles::find($id);
        return response()->json($article);
    }

    public function articleStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($request->file('banner')) {
            $banner = $request->file('banner')->store('banners');
        } else {
            $banner = $request->banner;
        }

        if ($request->mode != 'true') {
            $article = Articles::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'banner' => $banner,
                'category_id' => $request->category,
                'status' => $request->status,
                'content' => $request->content,
                'author_id' => Auth::user()->id,
            ]);

            // add article_count to categories
            $category = Categories::find($article->category_id);
            $category->articles_count = $category->articles_count + 1;
            $category->save();

            // add article_count to users
            $user = Users::find(Auth::user()->id);
            $user->articles_count = $user->articles_count + 1;
            $user->save();

        } else {
            $article = Articles::find($request->id);
            $article->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'banner' => $banner,
                'category_id' => $request->category,
                'status' => $request->status,
                'content' => $request->content,
            ]);
        }

        return response()->json($article);
    }

    public function articleDelete($id)
    {
        $article = Articles::find($id);
        if (File::exists(public_path('storage/' . $article->banner))) {
            File::delete(public_path('storage/' . $article->banner));
        }
        $article->delete();

        // remove article_count to categories
        $category = Categories::find($article->category_id);
        $category->articles_count = $category->articles_count - 1;
        $category->save();

        // remove article_count to users
        $user = Users::find($article->author_id);
        $user->articles_count = $user->articles_count - 1;
        $user->save();

        return redirect()->route('page.articles')->with('status', 'deleted');
    }

    /* * * */

    /*
     * Categories CMS
     */
    public function categories()
    {
        $categories = Categories::join('users', 'categories.author_id', '=', 'users.id')
            ->select('categories.*', 'users.username')
            ->get();

        return view('module.categories', compact('categories'));
    }

    public function categoryEdit($id)
    {
        $category = Categories::find($id);
        return response()->json($category);
    }

    public function categoryStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->mode == 'false') {
            $category = Categories::find($request->id);
            $category->category_name = $request->category_name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();

        } else {
            $category = Categories::create([
                'category_name' => $request->category_name,
                'description'   => $request->description,
                'status'        => $request->status,
                'author_id'     => Auth::user()->id
            ]);
        }

        $response = Categories::join('users', 'categories.author_id', '=', 'users.id')
            ->select('categories.*', 'users.username')
            ->where('categories.id', $category->id)
            ->first();

        return response()->json($response);
    }

    public function categoryDelete($id)
    {
        $category = Categories::find($id);
        $category->delete();

        return redirect()->route('page.categories')->with('status', 'deleted');
    }

    /*
     * Tags CMS
     */
    public function tags()
    {
        $tags = Tags::join('users', 'tags.author_id', '=', 'users.id')
            ->select('tags.*', 'users.username')
            ->get();

        return view('module.tags', compact('tags'));
    }

    public function tagEdit($id)
    {
        $tag = Tags::find($id);

        return response()->json($tag);
    }

    public function tagStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tag_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->mode == 'false') {
            $tag = Tags::find($request->id);
            $tag->tag_name = $request->tag_name;
            $tag->description = $request->description;
            $tag->status = $request->status;
            $tag->save();
        } else {
            $tag = Tags::create([
                'tag_name'     => $request->tag_name,
                'description'   => $request->description,
                'status'        => $request->status,
                'author_id'     => Auth::user()->id
            ]);
        }

        $response = Tags::join('users', 'tags.author_id', '=', 'users.id')
            ->select('tags.*', 'users.username')
            ->where('tags.id', $tag->id)
            ->first();

        return response()->json($response);
    }

    public function tagDelete($id)
    {
        $tag = Tags::find($id);
        $tag->delete();

        return redirect()->route('page.tags')->with('status', 'deleted');
    }
    /* * * * */



    /*
     * Users CMS
     */
    public function users()
    {
        $users = Users::all();
        return view('module.users', compact('users'));
    }

    public function userNew()
    {
        return view('posting.users');
    }

    public function userStore(Request $request)
    {
        $form = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'biography' => ''
        ]);

        $user = new Users;

        $user->name = $form['name'];
        $user->username = $form['username'];
        $user->email = $form['email'];

        if ($request->file('avatar')) {
            $user->avatar = $request->file('avatar')->store('users');
        }

        $user->biography = $form['biography'];
        $user->password = bcrypt($form['password']);
        $user->save();

        return redirect()->route('page.users')->with('status', 'User has been created successfully.');
    }

    public function userEdit($id)
    {
        $user = Users::find($id);

        return view('posting.users', compact('user'));
    }
    /* * * * */

    /*
     * Login & Register
     */
    public function login()
    {
        return view('module.login');
    }

    public function register()
    {
        return view('module.register');
    }
    /* * * * */

    /*
     * Ajax Response Debugging
     */

    public function ajaxDebug($request)
    {
        return response()->json($request->all());
    }
}
