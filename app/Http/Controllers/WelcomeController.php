<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::where('featured', true)->take(6)->inRandomOrder()->get();
        return view('welcome')->with('products', $products);
    }
}
