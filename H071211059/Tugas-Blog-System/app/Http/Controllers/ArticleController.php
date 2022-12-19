<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::withCount('comments', 'likes')
            ->latest()
            ->paginate();
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.article', compact('articles', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        // dd(ArticleTag::all());
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:articles,slug',
            'banner-url' => 'required_without:banner-file',
            'banner-file' => 'required_without:banner-url',
            'description' => 'required|max:255',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('banner-file')) {
            $validated['banner'] = $request->file('banner-file')->store('article-banners');
        } else {
            $validated['banner'] = $request['banner-url'];
        }

        $article = Article::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'banner' => $validated['banner'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'sub_category_id' => $validated['sub_category_id'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'author_id' => auth()->user()->id,
        ]);

        foreach ($validated['tags'] as $tag) {
            ArticleTag::create([
                'article_id' => $article->id,
                'tag_id' => $tag,
            ]);
        }

        return redirect(route('article'));
    }

    public function getArticle($id)
    {
        $article = Article::find($id);

        $tags = ArticleTag::where('article_id', $id)->get();

        return response()->json([
            'article' => $article->toJson(),
            'tags' => $tags->toJson(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:articles,slug,' . $request->id,
            'banner-url' => 'required_without:banner-file',
            'banner-file' => 'required_without:banner-url',
            'description' => 'required|max:255',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('banner-file')) {
            $validated['banner'] = $request->file('banner-file')->store('article-banners');
        } else {
            $validated['banner'] = $request['banner-url'];
        }

        $article = Article::find($request->id)->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'banner' => $validated['banner'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'sub_category_id' => $validated['sub_category_id'],
            'content' => $validated['content'],
            'status' => $validated['status'],
        ]);

        ArticleTag::where('article_id', $request->id)->delete();

        foreach ($validated['tags'] as $tag) {
            ArticleTag::create([
                'article_id' => $request->id,
                'tag_id' => $tag,
            ]);
        }

        return redirect(route('article'));
    }

    public function delete($id)
    {
        // dd($id);
        Article::find($id)->delete();
    }

    public function getSlug(Request $request)
    {
        // dd($request->title);
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        // dd($slug);
        return response()->json(['slug' => $slug]);
    }
}