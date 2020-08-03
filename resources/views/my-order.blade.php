@extends('layouts.app2')

@section('extra-css')
<style>
    .my-orders .order-container {
        margin-bottom: 64px;
    }

    .my-orders .order-header {
        background: #F6F6F6;
        border: 1px solid #DDDDDD;
        padding: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .my-orders .order-products {
        background: white;
        border: 1px solid #DDDDDD;
        border-top: none;
        padding: 14px;
    }

    .my-orders .order-header-items {
        display: flex;
    }

    .my-orders .order-header-items.div {
        margin-right: 14px;
    }

    .my-orders .order-product-item {
        display: flex;
        margin: 32px 0;
    }

    .my-orders .order-product-item.img {
        max-width: 140px;
        margin-right: 24px;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .font-bold {
        font-weight: bold;
    }
</style>
@endsection

@section('content')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section my-orders container">
        <div class="Order ID">
            <h1>Order ID: {{ $order->id }}</h1>

        </div> <!-- end sidebar -->

        <div class="my-profile">

            <div>
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold text-center">Order Placed At: </div>
                                {!! $order->created_at->format('d-m-Y\<\b\r\>h:i a') !!}
                            </div>

                        </div>
                       {{-- <div>
                            <div class="order-header-items">
                                <div><a href="#">Invoice</a></div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="order-products">
                        <table class="table" style="width:50%">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $order->billing_address }}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{ $order->billing_city }}</td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>{{ $order->billing_subtotal }}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>{{$order->billing_tax }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>EUR {{ $order->billing_total }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div> <!-- end order-container -->

                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                Order Items
                            </div>

                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($products as $product)
                            <div class="order-product-item">
                                {{--<div><img src="{{ asset($product->image) }}" alt="Product Image"></div> --}}
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->slug) }}"><h4>{{ $product->name }}</h4></a>
                                    </div>
                                    <div>{{ $product->price }}</div>
                                    <div>Quantity: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <br>
                    Back to <a href="{{ route('dash.index') }}">Dashboard</a>

                </div> <!-- end order-container -->
            </div>
        </div>
    </div>

@endsection