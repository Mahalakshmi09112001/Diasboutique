<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display the cart items
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        return view('cart.index', compact('cartItems'));
    }

    // Add a product to the cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => \DB::raw('quantity + ' . $request->quantity), // Increment quantity
            ]
        );

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Remove a product from the cart
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->user_id !== Auth::id()) {
            abort(403); // Forbidden access
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Update quantity in the cart
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($cartItem->user_id !== Auth::id()) {
            abort(403); // Forbidden access
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
