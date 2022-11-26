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

    // public function updateProductUseQueryBuilder(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'seller_id' => 'required',
    //         'category_id' => 'required',
    //         'price' => 'required',
    //         'status' => 'required',
    //     ]);

    //     DB::table('products')
    //         ->where('id', $request->id)
    //         ->update([
    //             'name' => $request->name,
    //             'seller_id' => $request->seller_id,
    //             'category_id' => $request->category_id,
    //             'price' => $request->price,
    //             'status' => $request->status,
    //             'updated_at' => \Carbon\Carbon::now()
    //         ]);

    //     return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    // }

    // public function updateProductUseEloquent(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'seller_id' => 'required',
    //         'category_id' => 'required',
    //         'price' => 'required',
    //         'status' => 'required',
    //     ]);

    //     $product = Product::find($request->id);
    //     $product->update($request->all());

    //     return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    // }

    // public function deleteProductUseEloquent($id)
    // {
    //     Product::find($id)->delete();

    //     return response('Product deleted successfully.', 200);
    // }

    // public function deleteProductUseQueryBuilder($id)
    // {
    //     DB::table('products')->delete($id);
    //     return response('Product deleted successfully.', 200);
    // }
}