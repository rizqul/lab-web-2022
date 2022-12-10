<?php

namespace App\Http\Controllers;
use App\Models\category;  //ini mesti dipanggil dlu dari models


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('category',[
            'data' => category::all()
        ]);
    }

    public function add()
    {
        return view('category');
    }
    public function store(Request $request)
    {
       $category = new category();
       $category->name = $request->input('name');
       $category->status = $request->input('status');
       $category->save();
       return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $singleData = category::find($id);
        $singleData->update($request->all());
        return redirect()->intended('/category');
    }

    public function delete($id)
    {
        $singleData = category::find($id);
        $singleData->delete();
        return redirect()->back();
    } 
}