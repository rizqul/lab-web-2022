<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class FeController extends Controller
{
    public function homepage()
    {
        $top_articles = Article::orderBy('view_count')->take(5)->get();
        $top_category = Category::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        $top_authors = User::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        // dd($top_authors);
        return view('welcome', compact('top_articles', 'top_category', 'top_authors'));
    }
}