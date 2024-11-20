<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
           $order->load('orderItems.product');
        return view('admin.orders.show', compact('order'));
    }
 public function update(Request $request, Order $order)
    {
        // Validate the status input
        $request->validate([
            'status' => 'required|string|in:Pending,Processing,Completed,Cancelled',
        ]);

        // Update the order's status
        $order->update(['status' => $request->status]);

        // Redirect with success message
        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }
}
