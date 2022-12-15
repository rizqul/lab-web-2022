<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate();

        return view('dashboard.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:categories', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        // dd($validated);
        $validated['author_id'] = auth()->user()->id;

        Category::create($validated);

        return redirect(route('category'));
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        // dd($category);

        return response()->json(
            [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
            ],
            200,
        );
    }

    public function update(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $request->id,
            'description' => 'required|max:255',
        ]);

        // dd($validated);

        Category::find($request->id)->update($validated);

        return redirect(route('category'));
    }

    public function delete($id)
    {
        // dd($id);
        Category::find($id)->delete();
    }
}