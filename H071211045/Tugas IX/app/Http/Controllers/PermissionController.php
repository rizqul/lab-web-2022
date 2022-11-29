<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;
use \Carbon\Carbon as Date;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller {

    public function storePermissionEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $permissions = Permissions::create(
            [
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission created successfully.');
    }

    public function storePermissionQuery(Request $request) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $permissions = DB::table('permissions')->insert(
            [
                'name' => $request->name,
                'status' => $request->status,
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $permissions = Permissions::find($id);
        $permissions->name = $request->name;
        $permissions->status = $request->status;
        $permissions->updated_at = Date::now();
        $permissions->save();

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission updated successfully');
    }

    public function updatePermissionQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $permissions = DB::table('permissions')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'status' => $request->status,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission updated successfully');
    }

    public function deletePermission($id) {
        $permissions = Permissions::find($id);
        $permissions->delete();

        return redirect()->route('index', compact('permissions'))
            ->with('success', 'Permission deleted successfully');
    }
}
