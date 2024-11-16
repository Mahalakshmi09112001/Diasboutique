<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the product already exists in the user's wishlist
        if ($user->wishlist()->where('product_id', $request->product_id)->exists()) {
            return redirect()->back()->with('error', 'This product is already in your wishlist.');
        }

        // Add the product to the user's wishlist
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to your wishlist!');
    }
}
