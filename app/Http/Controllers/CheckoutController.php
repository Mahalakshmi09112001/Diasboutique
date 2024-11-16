<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }

    public function store(Request $request)
{
    $request->validate([
        'shipping_address' => 'required|string|max:255',
        'payment_method' => 'required|string',
    ]);

    $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty!');
    }

    // Create the order
    $order = Order::create([
        'user_id' => Auth::id(),
        'status' => 'pending',
        'total_price' => $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        }),
        'shipping_address' => $request->shipping_address,
        'payment_method' => $request->payment_method,
    ]);

    // Create order items
    foreach ($cartItems as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->price,
        ]);
    }

    // Clear the cart
    Cart::where('user_id', Auth::id())->delete();

    // Pass the order to the confirmation view
    return view('checkout.confirmation', compact('order'));
}
}
