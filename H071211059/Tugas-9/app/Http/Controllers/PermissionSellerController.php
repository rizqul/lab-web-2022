<?php

namespace App\Http\Controllers;

use App\Models\PermissionSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionSellerController extends Controller
{
    public function index()
    {
        // get products using eloquent
        // $products = Product::latest()->paginate(5);
        $permission_sellers = DB::table('permission_sellers as ps')
            ->leftJoin('sellers as s', 's.id', '=', 'ps.seller_id')
            ->leftJoin('permissions as p', 'p.id', '=', 'ps.permission_id')
            ->select('ps.*', 's.name as seller_name', 'p.name as permission_name')
            ->paginate(5);

        $permissions = DB::table('permissions')->select('id', 'name')->get();
        $sellers = DB::table('sellers')->select('id', 'name')->get();

        return view('permissionseller', compact('permission_sellers', 'permissions', 'sellers'));
    }

    public function getPermissionSeller($id)
    {
        $permission_seller = PermissionSeller::find($id);

        return response()->json($permission_seller);
    }

    public function savePermissionSellerUseQueryBuilder(Request $request)
    {
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        DB::table('permission_sellers')
            ->insert([
                'seller_id' => $request->seller_id,
                'permission_id' => $request->permission_id,
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('permissionseller.index')->with('Success', 'Seller Permissiin created successfully');
    }

    public function savePermissionSellerUseEloquent(Request $request)
    {
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        PermissionSeller::create($request->all());

        return redirect()->route('permissionseller.index')->with('Success', 'Seller Permissiin created successfully');
    }

    public function updatePermissionSellerUseQueryBuilder(Request $request)
    {
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        DB::table('permission_sellers')
            ->where('id', $request->id)
            ->update([
                'seller_id' => $request->seller_id,
                'permission_id' => $request->permission_id,
                'updated_at' => \Carbon\Carbon::now(),
            ]);

        return redirect()->route('permissionseller.index')->with('Success', 'Seller Permissiin created successfully');
    }

    public function updatePermissionSellerUseEloquent(Request $request)
    {
        $request->validate([
            'seller_id' => 'required',
            'permission_id' => 'required',
        ]);

        $permission_sellers = PermissionSeller::find($request->id);
        $permission_sellers->update($request->all());

        return redirect()->route('permissionseller.index')->with('Success', 'Seller Permissiin created successfully');
    }

    public function deletePermissionSellerUseEloquent($id)
    {
        PermissionSeller::find($id)->delete();

        return response('Seller Permisssion deleted successfully.', 200);
    }

    public function deletePermissionSellerUseQueryBuilder($id)
    {
        DB::table('permission_sellers')->delete($id);
        return response('Seller Permisssion deleted successfully.', 200);
    }
}