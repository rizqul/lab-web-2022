<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Likes;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{   
    public function homepage() {
        $popularArticles = Articles::orderBy('likes', 'desc')->limit(5)->get();
        $latestArticles = Articles::orderBy('created_at', 'desc')->limit(5)->get();
        $popularCategories = Categories::orderBy('article_count', 'desc')->limit(5)->get();
        $mostActiveMember = Users::orderBy('article_count', 'desc')->limit(5)->get();

        return view('page.homepage',
            compact(
                'popularArticles',
                'latestArticles',
                'popularCategories',
                'mostActiveMember'
            )
        );
    }

    public function articleDetail($slug) {
        $article = Articles::where('slug', $slug)->first();
        $article->visitors += 1;
        $article->save();
        
        $comments = Comments::join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.article_id', $article->id)
            ->select('comments.*', 'users.username')
            ->get();
        
        $likes = Likes::where('article_id', $article->id)->get();
        $likes = $likes->count();

        $author = Users::where('id', $article->author_id)->first();
        return view('page.article-detail')->with([
            'article' => $article,
            'comments' => $comments,
            'likes' => $likes,
            'author' => $author->username
        ]);
    }

    public function comment(Request $request) {
        $comment = new Comments;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->comment;
        $comment->save();

        return redirect()->back();
    }
    
    public function articles() {
        $articles = Articles::orderBy('created_at', 'desc')->paginate(10);
        return view('page.article-list', compact('articles'));
    }

    public function members() {
        $users = Users::orderBy('created_at', 'desc')->paginate(10);
        return view('page.member-list', compact('users'));
    }

    public function member($username) {
        $user = Users::where('username', $username)->first();

        return view('page.member-detail', compact('user'));
    }

    public function like(Request $request) {
        $like = new Likes;

        if (Likes::where('article_id', $request->article_id)->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back();
        }
        $like->article_id = $request->article_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        $article = Articles::where('id', $request->article_id)->first();
        $article->likes += 1;
        $article->save();

        return redirect()->back();
    }

    

}
