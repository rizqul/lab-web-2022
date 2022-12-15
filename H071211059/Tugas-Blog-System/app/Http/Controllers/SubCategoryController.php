<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::latest()->paginate();
        $categories = Category::all();

        return view('dashboard.subcategory', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:sub_categories', 'max:255'],
            'description' => ['required', 'max:255'],
            'category_id' => ['required'],
        ]);

        // dd($validated);
        $validated['author_id'] = auth()->user()->id;

        SubCategory::create($validated);

        return redirect(route('sub-category'));
    }

    public function getSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        return response()->json(
            [
                'id' => $subcategory->id,
                'name' => $subcategory->name,
                'category_id' => $subcategory->category_id,
                'description' => $subcategory->description,
            ],
            200,
        );
    }

    public function getSubCategoryOf($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json(
            [
                'subcategory' => $subcategory->toJson()
            ],
            200,
        );
    }

    public function update(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:sub_categories,name,' . $request->id,
            'description' => 'required|max:255',
            'category_id' => 'required',
        ]);

        // dd($validated);

        SubCategory::find($request->id)->update($validated);

        return redirect(route('sub-category'));
    }

    public function delete($id)
    {
        // dd($id);
        SubCategory::find($id)->delete();
    }
}