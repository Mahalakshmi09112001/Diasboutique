<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   public function index()
{
    $orders = Order::with('customer')->get(); // Eager load the 'customer' relationship
    return view('admin.orders.index', compact('orders'));
}

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
