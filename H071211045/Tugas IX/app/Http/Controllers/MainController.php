<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Contents;
use App\Models\Permissions;
use App\Models\Products;
use App\Models\SellerPermissions;
use App\Models\Sellers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        // if (Contents::count() == 0) {
        //     $this->firstState();
        // }

        $products = Products::join('categories', 'products.category_id', '=', 'categories.id')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->select('products.*', 'categories.name as category', 'sellers.name as seller')
        ->latest()->paginate(5);

        $sellers = Sellers::latest()->paginate(5);

        $categories = Categories::latest()->paginate(5);

        $permissions = Permissions::latest()->paginate(5);

        $sellerPerms = SellerPermissions::join('sellers', 'sellers.id', '=', 'seller_permissions.seller_id')
            ->join('permissions', 'permissions.id', '=', 'seller_permissions.permission_id')
            ->select('seller_permissions.*', 'sellers.name as seller_name', 'permissions.name as permission_name')
            ->latest()->paginate(5);

            $showProducts = Contents::where('table_name', 'products') == 'true' ? true : false;
            $showCategories = Contents::where('table_name', 'categories') == 'true' ? true : false;
            $showSellers = Contents::where('table_name', 'sellers') == 'true' ? true : false;
            $showPermissions = Contents::where('table_name', 'permissions') == 'true' ? true : false;
            $showSellerPerms = Contents::where('table_name', 'seller_permissions') == 'true' ? true : false;

        if ($request->ajax()) {
            return response()->json(
                [
                    'products' => $products,
                    'sellers' => $sellers,
                    'categories' => $categories,
                    'permissions' => $permissions,
                    'sellerPerms' => $sellerPerms,
                    'showProducts' => $showProducts,
                    'showCategories' => $showCategories,
                    'showSellers' => $showSellers,
                    'showPermissions' => $showPermissions,
                    'showSellerPerms' => $showSellerPerms,
                ]
            );

        }
        // $this->products($showProducts);
        // $this->categories($showCategories);
        // $this->sellers($showSellers);
        // $this->permissions($showPermissions);
        // $this->sellerPerms($showSellerPerms);

        return view('index',
            compact(
                    'products',
                    'sellers',
                    'categories',
                    'permissions',
                    'sellerPerms',
                    'showProducts',
                    'showSellers',
                    'showCategories',
                    'showPermissions',
                    'showSellerPerms'
                ));
    }

    public function firstState() {
        Contents::create([
            'table_name' => 'products',
            'condition' => 'false',
        ]);

        Contents::create([
            'table_name' => 'sellers',
            'condition' => 'true',
        ]);

        Contents::create([
            'table_name' => 'categories',
            'condition' => 'true',
        ]);

        Contents::create([
            'table_name' => 'permissions',
            'condition' => 'true',
        ]);

        Contents::create([
            'table_name' => 'seller_permissions',
            'condition' => 'true',
        ]);
    }

    public function postView() {
        if (request()->ajax()) {
            DB::table('contents')
            ->where('table_name', request()->table_name)
            ->update(
                [
                    'condition' => request()->condition,
                ]
            );
        }

        return response()->json(['x' => 'success']);
    }
}
