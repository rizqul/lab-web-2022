<?php

namespace App\Http\Controllers;

use App\Models\SellerPermissions;
use Illuminate\Http\Request;
use \Carbon\Carbon as Date;
use Illuminate\Support\Facades\DB;

class SellerPermissionController extends Controller
{
    public function index() {
        $sellerPerms = SellerPermissions::join('sellers', 'sellers.id', '=', 'seller_permissions.seller_id')
            ->join('permissions', 'permissions.id', '=', 'seller_permissions.permission_id')
            ->select('seller_permissions.*', 'sellers.name as seller_name', 'permissions.name as permission_name')
            ->latest()->paginate(5);

        return view('index', compact('sellerPerms'));
    }

    public function storeSellerPermsEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        $sellerPerms = SellerPermissions::create(
            [
                'seller_id' => $request->seller_id,
                'permission_id' => $request->permission_id,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('sellerPerms'))
            ->with('success', 'Seller Permission created successfully.');
    }

    public function storeSellerPermsQuery(Request $request) { // Use Query Builder
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        $sellerPerms = DB::table('seller_permissions')->insert(
            [
                'seller_id' => $request->seller_id,
                'permission_id' => $request->permission_id,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('sellerPerms'))
            ->with('success', 'Seller Permission created successfully.');
    }

    public function editSellerPerms($id) {
        $sellerPerms = SellerPermissions::find($id);

        return view('index', compact('sellerPerms'));
    }

    public function updateSellerPermsEloquent(Request $request, $id) { // Use Eloquent
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        $sellerPerms = SellerPermissions::find($id);
        $sellerPerms->seller_id = $request->seller_id;
        $sellerPerms->permission_id = $request->permission_id;
        $sellerPerms->updated_at = Date::now();
        $sellerPerms->save();

        return redirect()->route('index', compact('sellerPerms'))
            ->with('success', 'Seller Permission updated successfully.');
    }

    public function updateSellerPermsQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        $sellerPerms = DB::table('seller_permissions')
            ->where('id', $id)
            ->update(
                [
                    'seller_id' => $request->seller_id,
                    'permission_id' => $request->permission_id,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('sellerPerms'))
            ->with('success', 'Seller Permission updated successfully.');
    }

    public function deleteSellerPerms($id) {
        $sellerPerms = SellerPermissions::find($id);
        $sellerPerms->delete();

        return redirect()->route('index', compact('sellerPerms'))
            ->with('success', 'Seller Permission deleted successfully.');
    }
}
