<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\article;
use Auth;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    public function showCategory()
    {
        $data = category::withCount('articles')->where('author_id', Auth::id())->get();
        return view('member/category')
            ->with(compact('data'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new category();
        $category->name = $request->name;
        $category->author_id = Auth::id();
        $category->save();

        return redirect()->to('/category')->send()->with('success', 'Your Category Successfully Uploaded!');
    }

    public function edit(Request $request, $id){
        $request->validate([
            'name'=>'required',
        ]);
        
        $category = category::find($id);
        $category->name = $request->name;

        $category->save();

        return redirect()->to('/category')->send()->with('success', 'Data berhasil di edit!');
    }

    public function delete($id)
    {
        $deleted = DB::table('categories')->where('id','=', $id)->delete();
        return redirect()->to('/category')->send()->with('success', 'Data berhasil di hapus!');
    }
}
