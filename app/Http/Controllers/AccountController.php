<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        // Example: Fetch user data (you might use Auth::user() to get logged-in user)
        return view('account.index');
    }

public function orders()
{
    // Get all orders for the authenticated user
    $orders = auth()->user()->orders()->with('items.product')->get();

    return view('account.orders', compact('orders'));
}



    public function wishlist()
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->get();
        return view('account.wishlist', compact('wishlist'));
    }

    public function settings()
    {
        return view('account.settings');
    }
    public function updateSettings(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            // Add more fields as necessary, like password or name
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update user fields
        $user->email = $request->email;
        // You can update other fields here like password or name

        // Save the changes to the user
        $user->save();

        // Redirect with a success message
        return redirect()->route('account.settings')->with('success', 'Account settings updated successfully!');
    }
}
