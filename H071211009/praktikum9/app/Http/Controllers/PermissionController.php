<?php

namespace App\Http\Controllers;
use App\Models\permission;  //ini mesti dipanggil dlu dari models


use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        return view('permission');
    }

    public function add()
    {
        return view('permission');
    }

    public function store(Request $request)
    {
        $permission = new permission();
        $permission->name = $request->input('name');
        $permission->description = $request->input('description');
        $permission->status = $request->input('status');
        $permission->save();
        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $singleData = permission::find($id);
        $singleData->update($request->all());
        return redirect()->intended('/permission');
    }

    public function delete($id)
    {
        $singleData = permission::find($id);
        $singleData->delete();
        return redirect()->back();
    } 
}
