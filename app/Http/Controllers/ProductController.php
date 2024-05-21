<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::when($request->keyword, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('description', 'like', "%{$request->keyword}%");
        })->where('status', 'published')->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
            'criteria' => 'required|in:perorangan,rombongan',
            'favorite' => 'required|boolean',
        ]);

        $data = $request->all();
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());
        $data['image'] = $image->hashName();

        try {
            Product::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create product');
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
            'criteria' => 'required|in:perorangan,rombongan',
            'favorite' => 'required|boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            $data['image'] = $image->hashName();
        }

        try {
            $product->update($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update product');
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        try {
            $product->update(['status' => 'archived']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete product');
        }

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
