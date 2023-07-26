<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function store(Request $request) {
        $request->validate([
            'tracking_code' => 'numeric'
        ]);

        $newOrder = new Order;
        $newOrder->customer_name = $request->customer_name;
        $newOrder->tracking_code =  random_int(1000,9999);
        $newOrder->product_id = $request->product_id;
        $newOrder->quantity_ordered = $request->quantity_ordered;
        $newOrder->total_price = $request->total_price;

        $newOrder->save();
        
        return response()->json();
    }
}
