<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::when($request->keyword, function ($query) use ($request) {
            return $query->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('description', 'like', "%{$request->keyword}%");
        })->orderBy('name')->paginate(10);

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        try {
            Category::create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create category');
        }

        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        try {
            $category->update($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update category');
        }

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete category');
        }

        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
