@extends('partials.base')
@section('content')
    <!--/banner-->
    <div class="banner-wthree-info container">

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

        <div class="row">
            <div class="col-lg-5 banner-left-info">
                <h3>Shop Online<span> lorem dolor eleifend </span></h3>
                <a href="{{ route('shop.index') }}" class="btn shop">Visit Shop</a>
            </div>

            <div class="col-lg-7 banner-img">
                <img src="/images/shopp01.png" alt="part image" class="img-fluid">
            </div>
        </div>
    </div>
    </div>

    <!--/gallery -->
    <section class="banner-bottom py-5">
        <h3 class="title-wthree mb-4 text-center"> Most Recommended</h3>
        <p class="text-center">Lorem ipsum dolor sit,Nulla pellentesque dolor ipsum laoreet eleifend integer,Pellentesque maximus libero.</p>

  <div class="container py-md-5">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 gal-img mt-4">
                        <a href="{{route('shop.show', $product->slug)}}">
                           <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="{{ $product->name }}">
                            <p>€{{ number_format($product->price, 2)}}</p>
                            <h4><a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></h4>
                        </a>
                    </div>
                @endforeach

            </div>
            <!-- gallery popups -->
            <!-- popup-->
        {{--@foreach($products as $product)
             <div id="gal1" class="popup-effect">
                 <div class="popup">
                     <a href="{{route('shop.show', $product->slug)}}"> <img src="{{$product->image}}" alt="{{$product->name}}" class="img-fluid mt-4" /> </a>
                     <a class="close" href="#gallery">&times;</a>
                 </div>
             </div>
     @endforeach --}}
        <!-- //popup -->
            <!-- //gallery popups -->
        </div>
    </section>
    <!-- //gallery-->

    <!--/banner-bottom -->
    <section class="collections">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <img src="images/sale-banner.jpg" class="img-fluid" alt="" />
                </div>
                <div class="col-md-4 ab-content text-center p-lg-5 p-3 my-lg-5">
                    <h4>Current Best Offers</h4>
                    <p>Lorem ipsum dolor sit,Nulla pellentesque dolor ipsum laoreet eleifend integer,Pellentesque maximus libero.</p>
                    <a href="{{ route('shop.index') }}" class="btn shop mt-3">Shop Now</a>

                </div>
            </div>
        </div>
    </section>
    <!-- /banner-bottom -->

    <!--/collections -->
<section class="banner-bottom py-5">
        <div class="container py-md-5">

            <h3 class="title-wthree mb-lg-5 mb-4 text-center">Seasonal Offers</h3>
            <div class="row text-center">


                <div class="col-md-4 content-gd-wthree">
                    <img src="/images/washing-machine-2.jpg" class="img-fluid" alt="" />
                </div>
                <div class="col-md-4 content-gd-wthree ab-content py-lg-2 my-lg-2">
                    <h4>Special Product Offers</h4>
                    <p>Lorem ipsum dolor sit,Nulla pellentesque dolor ipsum laoreet eleifend integer,Pellentesque maximus libero.</p>
                    <a href="shop.html" class="btn shop mt-3">Shop Now</a>

                </div>
                <div class="col-md-4 content-gd-wthree">
                    <img src="/images/iphone.jpg" class="img-fluid" alt="" />
                </div>
            </div>

        </div>
    </section>

@endsection