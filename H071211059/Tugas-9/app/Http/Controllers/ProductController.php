<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // get products using eloquent
        // $products = Product::latest()->paginate(5);
        $products = DB::table('products as p')
            ->leftJoin('sellers as s', 's.id', '=', 'p.seller_id')
            ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
            ->select('p.*', 's.name as seller_name', 'c.name as category_name')
            ->paginate(5);

        $categories = DB::table('categories')->select('id', 'name')->get();
        $sellers = DB::table('sellers')->select('id', 'name')->get();

        return view('product', compact('products', 'categories', 'sellers'));
    }
}