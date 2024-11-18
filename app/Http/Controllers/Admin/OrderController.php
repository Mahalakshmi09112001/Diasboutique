<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   public function index()
{
    $Users = User::latest()->get();
    $orders = Order::with('customer')->get(); // Eager load the 'customer' relationship
    return view('admin.orders.index', compact('orders','Users'));
}

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
