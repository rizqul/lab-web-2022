<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class FeController extends Controller
{
    public function homepage()
    {
        $top_articles = Article::where('status', '1')->orderBy('view_count', 'desc')->take(5)->get();
        $top_category = Category::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        $top_authors = User::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();

        return view('welcome', compact('top_articles', 'top_category', 'top_authors'));
    }

    public function articlesList()
    {
        $articles = Article::latest()->where('status', '1')->paginate(21);
        $top_category = Category::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        $top_authors = User::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();

        // dd($articles->links());
        return view('article-list', compact('articles', 'top_category', 'top_authors'));
    }

    public function authorsList()
    {
        $authors = User::latest()->paginate(20);
        // dd($authors);
        $top_category = Category::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        $top_authors = User::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();

        // dd($articles->links());
        return view('author-list', compact('authors', 'top_category', 'top_authors'));
    }

    public function viewArticle($slug)
    {
        $article = Article::where('slug', $slug)->get()[0];

        $article_id = $article->id;
        $comments = Comment::where('article_id', $article_id)->orderBy('created_at', 'desc')->get();
        $article->view_count = $article->view_count + 1;
        $article->save();
        $user_liked = 0;
        if (auth()->user()) {
            $liked = Like::where('article_id', $article_id)->where('user_id', auth()->user()->id)->get();
            if (count($liked) > 0) {
                $user_liked = $liked[0]->liked;
            } else {
                $user_liked = 0;
            }
        }

        $total_like = count(Like::where('article_id', $article_id)->where('liked', '1')->get());
        // dd($total_like);
        return view('article-page', compact('article', 'comments', 'user_liked', 'total_like'));
    }
}