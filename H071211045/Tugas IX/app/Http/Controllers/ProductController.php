<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use \Carbon\Carbon as Date;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {

    public function storeProductEloquent(Request $request) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        $products = Products::create(
            [
                'name' => $request->name,
                'seller_id' => $request->seller_id,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'status' => $request->status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('products'))
            ->with('success', 'Product created successfully.');
    }

    public function storeProductQuery(Request $request) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        $products = DB::table('products')->insert(
            [
                'name' => $request->name,
                'seller_id' => $request->seller_id,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'status' => $request->status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('products'))
            ->with('success', 'Product created successfully.');
    }

    public function editProduct($id) {
        $product = Products::find($id);

        return view('edit', compact('product'));
    }

    public function updateProductEloquent(Request $request, $id) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        $product = Products::find($id);
        $product->name = $request->name;
        $product->seller_id = $request->seller_id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->updated_at = Date::now();
        $product->save();

        return redirect()->route('index', compact('product'))
            ->with('success', 'Product updated successfully');
    }

    public function updateProductQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'seller_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        $product = DB::table('products')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'seller_id' => $request->seller_id,
                    'category_id' => $request->category_id,
                    'price' => $request->price,
                    'status' => $request->status,
                    'updated_at' => Date::now(),
                ]
            );

        return redirect()->route('index', compact('product'))
            ->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id) {
        $product = Products::find($id);
        $product->delete();

        return redirect()->route('index')
            ->with('success', 'Product deleted successfully');
    }

}
