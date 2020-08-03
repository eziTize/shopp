@extends('partials.base2')
@section('content')


    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!------ //HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <section class="jumbotron">

        <div class="container">
            <div>
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

                @if (Cart::count() > 0)

            <h2 class="jumbotron-heading text-center mb-4">YOUR CART</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:50%" class="text-sm-center">Quantity</th>
                                <th style="width:50%">Price</th>
                                <th style="width:10%"></th>
                                <th style="width:8%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <h4 class="nomargin"><a href="{{ route('shop.show', $item->model->slug) }}">
                                                   {{ $item->model->name }}
                                                </a></h4>
                                        </div>
                                    </div>
                                </td>

                                <td class="quantity text-sm-center">

                                    <div class="quantity">

                                        <a href="{{ route('cart.decr', ['id' => $item->rowId, 'qty' => $item->qty ]) }}" class="quantity-minus"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                            <input title="Qty" class="input-text text text-sm-center" style="width: 45px" type="text" value="{{ $item->qty }}" placeholder="1" readonly>
                                        <a href="{{ route('cart.incr', ['id' => $item->rowId, 'qty' => $item->qty ]) }}" class="quantity-plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>

                                </td>


                                </td>
                                <td data-th="Price">€{{ number_format($item->subtotal, 2) }}</td>
                                <td class="actions" data-th="">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn del-cart btn-sm"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach

                            <td><h3><strong>Total</strong></h3></td>
                            <td></td>
                            <td class=""><h3>
                                    <strong> €{{number_format (Cart::subtotal(), 2 )}} </strong>
                                </h3></td>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mt-3">

                            <a href="{{route('home')}}"><button class="btn keep-shop-cart btn-info">Keep Shopping </button></a>

                        </div>
                        <div class="col-sm-12 col-md-6 mt-3">
                            <a href="{{route('checkout.index')}}">
                                <button class="btn checkout-cart btn-success">Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <h3 class="text-center mt-4"> You Might Also Like</h3>
            @include('partials.might-like')
            @else

                <h3 class="text">No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="btn cont-cart btn-lg btn-info mt-4">Continue Shopping</a>
                <div class="spacer"></div>

        @endif

    </section>

@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();
    </script>
@endsection