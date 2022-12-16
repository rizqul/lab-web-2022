<?php

namespace App\Http\Controllers;
use App\Models\product;//ini mesti dipanggil dlu dari models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    //
    public function index()
    {
        $data = product::with('seller','category')->paginate(10);
        $data1 = DB::table('sellers')->get();
        $data2 = DB::table('categories')->get();
        return view('product')
            ->with(compact('data'))
            ->with(compact('data1'))
            ->with(compact('data2'));
    }
    public function add()
    {
        return view('product');
    }
   
    public function store(Request $request)
    {
       $product = new product();
       $product->name = $request->input('name');
       $product->seller_id = $request->input('seller_id');
       $product->category_id = $request->input('category_id');
       $product->price = $request->input('price');
       $product->status = $request->input('status');
       $product->save();
       return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $singleData = product::find($id);
        $singleData->update($request->all());
        return redirect()->intended('/product');
    }
    public function delete($id)
    {
        $singleData = product::find($id);
        $singleData->delete();
        return redirect()->back();
    }
}