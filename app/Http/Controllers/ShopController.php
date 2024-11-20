<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;


use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
         $banners = Banner::all(); // Fetching banners
        $products = Product::all();
         $categories = Category::all(); // Fetch all categories
        return view('shop.index', compact('products','categories','banners'));
    }
 public function filterByCategory($id)
    {
        $banners = Banner::all();
        $categories = Category::all(); // Fetch all categories
        $products = Product::where('category_id', $id)->get(); // Filter products by category

        return view('shop.index', compact('categories', 'products','banners'));
    }


   public function show($id)
{
    $product = Product::with('category')->findOrFail($id);
    $similarProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id) // Exclude the current product
                ->take(5) // Limit the number of similar products
                ->get();
    return view('shop.show', compact('product','similarProducts'));
}

}
