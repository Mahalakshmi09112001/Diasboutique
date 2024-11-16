<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();  // Get all categories
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required',
        'image' => 'required|image',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
        'mrp' => 'required|numeric',
        'price' => 'required|numeric',
    ]);

    $imagePath = $request->file('image')->store('products', 'public');

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imagePath,
        'category_id' => $request->category_id,
        'stock' => $request->stock, // Add this
        'mrp' => $request->mrp,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
}


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image; // Keep the old image if none is uploaded
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'mrp' => $request->mrp,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
