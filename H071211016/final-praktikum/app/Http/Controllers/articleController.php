<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\articleTag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


class articleController extends Controller
{

    public function showArticleDetail($id, $id2)
    {
        $data2 = DB::table('users')->find($id2);
        $data1 = DB::table('articles')->find($id);
        $data3 = DB::table('categories')->where('id', $data1->category_id)->get();
        $data4 = DB::table('article_tags')->where('article_id', $data1->id)->get();
        $data5 = articleTag::where('article_id', $data1->id)->get();
        return view('member/articleDetail')
            -> with(compact('data2'))
            -> with(compact('data1'))
            -> with(compact('data3'))
            -> with(compact('data4'))
            -> with(compact('data5'));
    }

    public function showArticles()
    {
        $data = article::where('member_id', Auth::id())->get();
        return view('member/article')->with(compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'body'=>'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $article = new article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->body = $request->body;
        $article->member_id = Auth::id();
        $article->category_id = $request->category;
        $article->sub_category_id = $request->subCategory;
        $article->status = $request->status;

        $article->save();

        $query = DB::table('tags')->where('author_id', Auth::id())->get();
        foreach ($query as $list) {
            $data[] = array(
            'article_id'  => $article->id,
            'tag_id'      => $request->input('tags'.$list->id),
          );
        }
        //dd($data);
        DB::table('article_tags')->insert($data); 

        return redirect()->to('/articles')->send()->with('success', 'Your Articles Successfully Uploaded!');
    }

    public function showCreateArticles()
    {
        $data = DB::table('categories')->where('author_id', Auth::id())->get();
        $data2 = DB::table('tags')->where('author_id', Auth::id())->get();
        $data3 = DB::table('sub_category')->where('author_id', Auth::id())->get();
        return view('member/createArticle')
            ->with(compact('data'))
            ->with(compact('data2'))
            ->with(compact('data3'));
    }

    public function showArticleEdit($id)
    {
        $data = DB::table('categories')->where('author_id', Auth::id())->get();
        $data2 = DB::table('tags')->where('author_id', Auth::id())->get();
        $data3 = DB::table('sub_category')->where('author_id', Auth::id())->get();
        $data4 = DB::table('articles')->where('id', $id)->get();
        return view('member/articleEdit')
            ->with(compact('data'))
            ->with(compact('data2'))
            ->with(compact('data3'))
            ->with(compact('data4'));
    }

    public function edit(Request $request, $id){
        $article = article::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->body = $request->body;
        $article->member_id = Auth::id();
        $article->category_id = $request->category;
        $article->sub_category_id = $request->subCategory;
        $article->status = $request->status;

        $article->save();

        $deleteTag = DB::table('article_tags')->where('article_id', $id)->delete();

        $query = DB::table('tags')->where('author_id', Auth::id())->get();
        foreach ($query as $list) {
            $data[] = array(
            'article_id'  => $article->id,
            'tag_id'      => $request->input('tags'.$list->id),
          );
        }
        //dd($data);
        DB::table('article_tags')->insert($data);

        return redirect()->to('/articles')->send()->with('success', 'Data berhasil di edit!');
    }
}
