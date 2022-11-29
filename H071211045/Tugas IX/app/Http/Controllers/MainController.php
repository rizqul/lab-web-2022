<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Permissions;
use App\Models\Products;
use App\Models\SellerPermissions;
use App\Models\Sellers;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function index() {
        $products = Products::join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('products.*', 'categories.name as category_name', 'sellers.name as seller_name')
            ->latest()->paginate(5);

        $sellers = Sellers::latest()->paginate(5);

        $categories = Categories::latest()->paginate(5);

        $permissions = Permissions::latest()->paginate(5);

        $sellerPerms = SellerPermissions::join('sellers', 'sellers.id', '=', 'seller_permissions.seller_id')
            ->join('permissions', 'permissions.id', '=', 'seller_permissions.permission_id')
            ->select('seller_permissions.*', 'sellers.name as seller_name', 'permissions.name as permission_name')
            ->latest()->paginate(5);

        return view('index', compact('products', 'sellers', 'categories', 'permissions', 'sellerPerms'));
    }

}
