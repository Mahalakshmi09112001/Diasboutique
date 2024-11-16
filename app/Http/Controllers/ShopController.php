<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
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
