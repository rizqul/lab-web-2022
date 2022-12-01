<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;
use \Carbon\Carbon as Date;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller {

    public function storePermissionEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'permission_name' => 'required',
            'permission_description' => 'required',
            'permission_status' => 'required',
        ]);

        Permissions::create(
            [
                'name' => $request->permission_name,
                'description' => $request->permission_description,
                'status' => $request->permission_status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->back()
            ->with('success', 'Permission created successfully.');
    }

    public function storePermissionQuery(Request $request) { // Use Query Builder
        $request->validate([
            'permission_name' => 'required',
            'permission_status' => 'required',
        ]);

        $permissions = DB::table('permissions')->insert(
            [
                'name' => $request->permission_name,
                'status' => $request->permission_status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission created successfully.');
    }

    public function editPermission($id) {
        $permissions = Permissions::find($id);

        return view('index', compact('permissions'));
    }

    public function updatePermissionEloquent(Request $request, $id) { // Use Eloquent
        $request->validate([
            'permission_name' => 'required',
            'permission_status' => 'required',
        ]);

        $permissions = Permissions::find($id);
        $permissions->name = $request->permission_name;
        $permissions->status = $request->permission_status;
        $permissions->updated_at = Date::now();
        $permissions->save();

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission updated successfully');
    }

    public function updatePermissionQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'permission_name' => 'required',
            'permission_status' => 'required',
        ]);

        $permissions = DB::table('permissions')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->permission_name,
                    'status' => $request->permission_status,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission updated successfully');
    }

    public function deletePermission($id) {
        $permissions = Permissions::find($id);
        $permissions->delete();

        return redirect('/');
    }
}
