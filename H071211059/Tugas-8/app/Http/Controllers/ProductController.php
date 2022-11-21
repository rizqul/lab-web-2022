<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = products::with('imagesrcs')->latest()->paginate(5);

        return view('index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'series' => 'required',
            'prod_desc' => 'required',
            'img_sources' => 'required',
        ]);

        $id = DB::table('products')->insertGetId([
            'productName' => $request->title,
            'price' => $request->price,
            'qty' => $request->qty,
            'series' => $request->series,
            'description' => $request->prod_desc,
        ]);

        $images = explode(',', $request->img_sources);

        foreach ($images as $image) {
            DB::table('imagesrcs')->insert([
                'products_id' => $id,
                'src' => $image
            ]);
        }
        return redirect()->route('index')->with('success', 'Customer created succesfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'series' => 'required',
            'prod_desc' => 'required',
            'img_sources' => 'required',
        ]);

        DB::table('products')
            ->where('id', $request->id)
            ->update([
                'productName' => $request->title,
                'price' => $request->price,
                'qty' => $request->qty,
                'series' => $request->series,
                'description' => $request->prod_desc,
            ]);

        return redirect()->route('index')->with('success', 'Customer created succesfully');
    }

    public function delete($id)
    {
        DB::table('products')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route('index')->with('success', 'Customer created succesfully');

    }
}
