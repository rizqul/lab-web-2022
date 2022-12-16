<?php

namespace App\Http\Controllers;
use App\Models\seller;  //ini mesti dipanggil dlu dari models

use Illuminate\Http\Request;


    class SellerController extends Controller
{
    //
    public function index()
    {
        return view('seller', [
            "tittle" => "Data Seller",
            "data" =>seller::paginate(10)
        ]);
    }
    public function add()
    {
        return view('seller');
    }
    public function store(Request $request)
    {
        $seller = new seller();
        $seller->name = $request->input('name');
        $seller->address = $request->input('address');
        $seller->gender = $request->input('gender');
        $seller->no_hp = $request->input('no_hp');
        $seller->status = $request->input('status');
        $seller->save();
        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $singleData = seller::find($id);
        $singleData->update($request->all());
        return redirect()->intended('/seller');
    }
    public function delete($id)
    {
        $singleData = seller::find($id);
        $singleData->delete();
        return redirect()->back();
    }

}
