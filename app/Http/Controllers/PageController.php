<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;



class PageController extends Controller
{
    public function home()
    {
         $newArrivals = Product::latest()->take(4)->get();
        $exploreCollections = Product::all();
        $categories =Category::all();

        return view('home', compact('newArrivals', 'exploreCollections','categories'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function terms()
    {
        return view('terms');
    }
}
