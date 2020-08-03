<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->with('products')->get(); // fix n + 1 issues

        return view('dashboard')->with('orders', $orders);
    }

    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back()->withErros('You do not have access to this!');
        }

        $products = $order->products;

        return view('my-order')->with([
            'order' => $order,
            'products' => $products,
        ]);
    }

}
