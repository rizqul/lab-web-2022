<?php

namespace App\Http\Controllers;
use App\Models\seller_permission;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SellerPermissionController extends Controller
{
    public function index()
    {
        $data = seller_permission::with('sellers', 'permissions')->paginate(10);
        $data1 = DB::table('sellers')->get();
        $data2 = DB::table('permissions')->get();
        return view('seller_permission')
            ->with(compact('data'))
            ->with(compact('data1'))
            ->with(compact('data2'));
    }

    public function add()
    {
        return view('seller_permission');
    }

    public function store(Request $request)
    {
        $seller_permission = new seller_permission();
        $seller_permission->seller_id = $request->input('seller_id');
        $seller_permission->permission_id = $request->input('permission_id');
        $seller_permission->save();
        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $singleData = seller_permission::find($id);
        $singleData->update($request->all());
        return redirect()->intended('/seller_permission');
    }

    public function delete($id)
    {
        $singleData = seller_permission::find($id);
        $singleData->delete();
        return redirect()->back();
    } 
}
