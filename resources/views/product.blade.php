@extends('partials.base')
@section('content')
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">

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

        <div class="container py-md-5">

            <!-- product right -->
            <div class="left-ads-display wthree">
                <div class="row">
                    <div class="desc1-left col-md-6">
                        <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    <div class="desc1-right col-md-6 pl-lg-3">
                        <br>
                        <h2>{{$product->name}}</h2>
                        <br>
                        <h5>€{{ number_format($product->price, 2) }}</h5>
                        <div class="available mt-3">
                            {{-- <span><a href="#"> test text </a></span> --}}
                            <p>{!! $product->details !!} </p>
                            <br>
                            <form class="mb-4" action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price}}">
                                <button type="submit" class="btn submit">Add to Cart</button>
                            </form>
                        </div>
                        <div class="share-desc">
                            <div class="share text-left">
                                <h4>Share Product :</h4>
                                <div class="social-ficons mt-4">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span> Like us on Facebook</a></li>
                                       {{-- <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                                        <li><a href="#"><span class="fa fa-google"></span>Google</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
               {{-- <div class="row sub-para-w3pvt my-5 ml-4 mr-4 text-left">
                    <h3 class="shop-sing">Description</h3>
                    <p>{{$product->description}}</p>
                </div> --}}

            </div>
        </div>
    </section>
    <!-- /banner-bottom -->
    <h2 class="text-center mt-4">You May Also Like</h2>
    @include('partials.might-like')


@endsection