<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Mail\OrderPlaced;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Http\Requests\CheckoutRequest;
use Session;

use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }
         return view('checkout');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 /*   public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response


    public function store()
    {
        Stripe::setApiKey("sk_test_x8GnPG7CnuciIuK5IbOhtTub00yMLFiVz8");
        $charge = Charge::create([
            'amount' => Cart::subtotal() * 100,
            'currency' => 'eur',
            'description' => 'Demo Payment',
            'source' => request()->stripeToken
        ]);
        Session::flash('success', 'Purchase successfull. wait for our email.');
        Cart::destroy();
        return redirect('/thankyou');
    }*/

    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();
        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    //change to Order ID after we start using DB
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ],
            ]);
            // SUCCESSFUL

            $order = $this->addToOrdersTables($request, null);
            Mail::send(new OrderPlaced($order));

            Cart::instance('default')->destroy();

            // return back()->with('success_message', 'Thank you! Your payment has been successfully accepted!');
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }


    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'payment_gateway' => "Stripe",
            //'billing_name_on_card' => $request->name_on_card,
            /* 'billing_discount' => $this->getNumbers()->get('discount'),
             /*'billing_discount_code' => $this->getNumbers()->get('code'),
             /*'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
             /*'billing_tax' => $this->getNumbers()->get('newTax'),*/
            'billing_total' => Cart::subtotal(),
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
