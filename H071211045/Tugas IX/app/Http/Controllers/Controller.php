<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $data = Products::join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'sellers.name as seller_name', 'categories.name as category_name')
            ->get();

        return view('index', compact('data'));
    }
}
