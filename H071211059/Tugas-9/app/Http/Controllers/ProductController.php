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

    public function getProduct($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

    public function saveProductUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        DB::table('products')
            ->insert([
                'name' => $request->name,
                'seller_id' => $request->seller_id,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'status' => $request->status,
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    }

    public function saveProductUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    }

    public function updateProductUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        DB::table('products')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'seller_id' => $request->seller_id,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'status' => $request->status,
                'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    }

    public function updateProductUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $product = Product::find($request->id);
        $product->update($request->all());

        return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    }

    public function deleteProductUseEloquent($id)
    {
        Product::find($id)->delete();

        return response('Product deleted successfully.', 200);
    }

    public function deleteProductUseQueryBuilder($id)
    {
        DB::table('products')->delete($id);
        return response('Product deleted successfully.', 200);
    }
}