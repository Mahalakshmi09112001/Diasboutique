<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchResults = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        return view('shop', ['products' => $searchResults, 'query' => $query]);
    }
}
