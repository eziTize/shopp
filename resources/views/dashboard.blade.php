@extends('layouts.app')

@section('extra-css')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <strong>Hello {{ Auth::user()->name }}, Welcome to your Dashboard!</strong>
                    <div class="card-header">
                        <h3>Dashboard Menu</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="mb-4" > <span class="fa fa-user-circle-o"></span>  Your Profile <a href="/my-profile"> <i class="fa fa-pencil-square-o"></i></a></h4>
                        <div class="dropdown-divider"></div>
                        <h4 class="mb-4 mt-4"> <span class="fa fa-shopping-basket"></span> Your Orders</h4>

                        <div class="panel-body mt-4" style="padding-top:0; overflow-x:auto;">
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
                                        <td>{!! $order->created_at->format('d/m/Y\<\b\r\>h:i a') !!}</td>
                                        <td>
                                            @if($order->shipped  === 1)
                                                Shipped
                                            @else
                                                Not Shipped
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{   route('orders.show', $order->id) }}"> Click to View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection