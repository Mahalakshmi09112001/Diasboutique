<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the required data for the dashboard
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_price'); // Example for total revenue calculation
        
        // Get recent orders and users (limit to 5)
        $recentOrders = Order::latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();
        
        // Return the view with the data
        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalUsers', 'totalRevenue', 'recentOrders', 'recentUsers'));
    }
}
