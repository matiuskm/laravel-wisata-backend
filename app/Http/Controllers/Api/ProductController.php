<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //index
    public function index(Request $request)
    {
        $products = Product::when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })->with('category')->orderBy('favorite', 'desc')->get();

        return response()->json(['status' => 'success', 'data' => $products], 200);
    }

    // store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:published,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|numeric',
            'criteria' => 'required|in:perorangan,rombongan',
            'favorite' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            $response = "";
            foreach ($validator->errors()->all() as $error) {
                $response .= $error . ' ';
            }

            return response()->json(['error' => $response], 400);
        }

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image->storeAs('public/products', $image->hashName());
                $data['image'] = $image->hashName();
            }

            $product = Product::create($data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to create product'], 400);
        }

        return response()->json(['status' => 'success', 'data' => $product], 201);
    }

    // show
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $product], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:published,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|numeric',
            'criteria' => 'required|in:perorangan,rombongan',
            'favorite' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            $response = "";
            foreach ($validator->errors()->all() as $error) {
                $response .= $error . ' ';
            }

            return response()->json(['error' => $response], 400);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image->storeAs('public/products', $image->hashName());
                $data['image'] = $image->hashName();
            }

            $product->update($data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to update product'], 400);
        }

        return response()->json(['status' => 'success', 'data' => $product], 200);
    }

    // destroy
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }

        try {
            // update status to archived
            $product->update(['status' => 'archived']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete product'], 400);
        }

        return response()->json(['status' => 'success', 'message' => 'Product deleted successfully'], 200);
    }
}
