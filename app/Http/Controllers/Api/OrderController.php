<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // store
    public function store(Request $request)
    {
        // validate incoming request
        $request->validate([
            'order_date' => 'required|date',
            'total_price' => 'required|integer',
            'total_items' => 'required|integer',
            'payment_amount' => 'required|integer',
            'payment_method' => 'required|string',
            'cashier_name' => 'required|string',
            'cashier_id' => 'required|integer|exists:users,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer',
            'items.*.total_price' => 'required|integer',
        ]);

        // create order
        $order = new Order();
        $order->order_date = $request->order_date;
        $order->total_price = $request->total_price;
        $order->total_items = $request->total_items;
        $order->payment_amount = $request->payment_amount;
        $order->payment_method = $request->payment_method;
        $order->cashier_name = $request->cashier_name;
        $order->cashier_id = $request->cashier_id;
        $order->save();

        // create order items
        $order->items()->createMany($request->items);

        return response()->json(['message' => 'Order created successfully', 'data' => $order], 201);
    }
}
