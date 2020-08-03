@extends('partials.base')
@section('content')

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

        <h3 class="title-wthree mb-lg-5 mb-4 text-center">Shop Now</h3>
        <div class="container">

            {{-- sort div--}}

            <div class="mob-sidebar" >
                <h3><a href="#">Sort By</a></h3>

                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">

                    <option value="">Categories</option>
                    <option value="{{route('shop.index')}}" >Featured</option>
                    @foreach($categories as $category)
                        <option value="{{ route('shop.index', ['category' => $category->slug]) }}">{{$category->name}}</option>
                    @endforeach

                </select>

                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <h3 class="price" id="sort-bar"> <a href="#"> Sort By Price </a></h3>
                    <option>Price</option>
                    <option value="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</option>
                    <option value="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High To Low</option>
                </select>
            </div>

            {{-- End sort div --}}
            <div class="products-header-shop">
            <h3 class="text-center">{{ $categoryName }}</h3>
            </div>
            <div class="row shop-wthree-info text-center">
                @forelse ($products as $product)

                    <div class="col-lg-3 shop-info-grid text-center mt-4">
                        <div class="product-shoe-info shoe">
                            <div class="men-thumb-item">
                                <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="{{$product->name}}">
                            </div>
                            <div class="item-info-product">
                                <h4>
                                    <a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a>
                                </h4>

                                <div class="product_price">
                                    <div class="grid-price">
                                        <span class="money">€{{ number_format($product->price, 2) }}</span>

                                        <form action="{{ route('cart.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price}}">
                                            <button type="submit" class="btn shop mt-3">Add to Cart</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                        <div class="no-items-shop">
                            <h4> No items found </h4>
                        </div>
                    @endforelse
            </div>

            <!--//row-->

            <!--//row-->
            <div class="page-navigation">
            {{ $products->appends(request()->input())->links() }}
            </div>

            {{--<nav aria-label="Page navigation mt-5">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> --}}
        </div>
    </section>
    <!-- /banner-bottom -->

@endsection