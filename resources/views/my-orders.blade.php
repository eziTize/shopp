@extends('layouts.app2')
@section('extra-css')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        td, th {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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




    <div class="order-header">
        <h2 class="text-center">My Orders</h2>
    </div>


    <table>
        <tr>
            <th>Order ID</th>
            <th>Billing Name</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th> Status </th>
            <th> View Order</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->billing_name }}</td>
                <td> €{{ number_format($order->billing_total, 2) }}</td>
                <td>{!! $order->created_at->format('d-m-Y\<\b\r\>h:i a') !!}</td>
                <td>
                    @if($order->shipped  === 1)
                        Shipped
                        @else
                        Not Shipped
                    @endif
                </td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}"> Click to View </a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection