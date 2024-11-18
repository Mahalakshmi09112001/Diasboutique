<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;




class PageController extends Controller
{
    public function home()
    {
         $newArrivals = Product::latest()->take(4)->get();
        $exploreCollections = Product::all();
        $categories =Category::all();
        $sliders = Slider::all(); // Fetch all sliders from the database
        return view('home', compact('newArrivals', 'exploreCollections','categories','sliders'));
    }

    public function contact()
    {
        return view('contact');
    }
     public function about()
    {
        return view('about');
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
