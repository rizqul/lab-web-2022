<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\article;
use Auth;
use Illuminate\Support\Facades\DB;


class subCategoryController extends Controller
{
    public function showSubCategory()
    {
        $data = subCategory::withCount('articles')->where('author_id', Auth::id())->get();
        $data2 = DB::table('categories')->where('author_id', Auth::id())->get();
        return view('member/subCategory')
            ->with(compact('data'))
            ->with(compact('data2'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'categoryName' => 'required',
        ]);

        $subCategory = new subCategory();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->categoryName;
        $subCategory->author_id = Auth::id();
        $subCategory->save();

        return redirect()->to('/subCategory')->send()->with('success', 'Your Category Successfully Uploaded!');
    }

    public function edit(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'categoryName' => 'required',
        ]);
        
        $subCategory = subCategory::find($id);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->categoryName;
        $subCategory->save();

        return redirect()->to('/subCategory')->send()->with('success', 'Data berhasil di edit!');
    }

    public function delete($id)
    {
        $deleted = DB::table('sub_category')->where('id','=', $id)->delete();
        return redirect()->to('/subCategory')->send()->with('success', 'Data berhasil di hapus!');
    }
}
