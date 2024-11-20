<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Display all products or search results
    public function index(Request $request)
    {
        $banners = Banner::all(); // Fetching banners
        $categories = Category::all(); // Fetch all categories

        // Initialize $query to null, or set to the search query if provided
        $query = $request->input('query');

        // If a search query is provided
        if ($query) {
            // Search products by name or description
            $products = Product::where('name', 'LIKE', "%{$query}%")
                               ->orWhere('description', 'LIKE', "%{$query}%")
                               ->get();
        } else {
            // If no search query, fetch all products
            $products = Product::all();
        }

        // Pass the query to the view so it can be displayed in the search input
        return view('shop.index', compact('products', 'categories', 'banners', 'query'));
    }

    // Filter products by category
    public function filterByCategory($id)
    {
        $banners = Banner::all();
        $categories = Category::all(); // Fetch all categories
        $products = Product::where('category_id', $id)->get(); // Filter products by category

        return view('shop.index', compact('categories', 'products', 'banners'));
    }

    // Show product details
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $similarProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) // Exclude the current product
            ->take(5) // Limit the number of similar products
            ->get();

        return view('shop.show', compact('product', 'similarProducts'));
    }
}
