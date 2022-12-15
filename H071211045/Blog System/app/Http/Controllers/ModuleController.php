<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Tags;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function dashboard()
    {
        return view('module.dashboard');
    }

    public function articles()
    {
        return view('module.articles');
    }

    /*
     * Categories CMS
     */
    public function categories()
    {   
        $categories = Categories::join('users', 'categories.author_id', '=', 'users.id')
            ->select('categories.*', 'users.username')
            ->get();

        return view('module.tags', compact('cateogies'));
    }

    public function categoryEdit($id)
    {
        $category = Categories::find($id);

        return response()->json($category);
    }

    public function categoryStore(Request $request) {

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
            $category->save();

        } else {
            $category = Categories::create([
                'category_name' => $request->category_name, 
                'description'   => $request->description,
                'author_id'     => Auth::user()->id
            ]);
        }
        
        $response = Categories::join('users', 'categories.author_id', '=', 'users.id')
            ->select('categories.*', 'users.username')
            ->where('categories.id', $category->id)
            ->first();
        
        return response()->json($response);
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

    public function tagStore(Request $request) {

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
            $tag->save();

        } else {
            $tag = Tags::create([
                'tag_name'     => $request->tag_name, 
                'description'   => $request->description,
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
}
