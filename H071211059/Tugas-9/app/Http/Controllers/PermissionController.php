<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->paginate(5);

        return view('permission', compact('permissions'));
    }

    public function savePermissionUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);

        Permission::create($request->all());

        return redirect()->route('permission.index')->with('Success', 'Permission created successfully');
    }

    public function savePermissionUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);

        DB::table('permission')
            ->insert([
                'name' => $request->name,
                'status' => $request->status,
                'description' => $request->desc,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('permission.index')->with('Success', 'Permission created successfully');
    }

    public function getPermission($id)
    {
        $permission = Permission::find($id);

        return response()->json($permission);
    }
}