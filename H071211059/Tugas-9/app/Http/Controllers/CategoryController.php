<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('category', compact('categories'));
    }

    public function saveCategoryUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('Success', 'Category created successfully');
    }

    public function saveCategoryUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        DB::table('categories')
            ->insert([
                'name' => $request->name,
                'status' => $request->status,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('category.index')->with('Success', 'Category created successfully');
    }

    public function getCategory($id)
    {
        $category = Category::find($id);

        return response()->json($category);
    }

    public function updateCategoryUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $category = Category::find($request->id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('Success', 'Category updated successfully');
    }

    public function updateCategoryUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        DB::table('categories')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('category.index')->with('Success', 'Category updated successfully');
    }

    public function deletecategoryUseEloquent($id)
    {
        category::find($id)->delete();

        return response('Category deleted successfully.', 200);
    }

    public function deletecategoryUseQueryBuilder($id)
    {
        DB::table('categories')->delete($id);
        return response('Category deleted successfully.', 200);
    }
}