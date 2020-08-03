
<!--/might like products-->
<div class="row shop-wthree-info text-center">
    @foreach($mightAlsoLike as $product)
        <div class="col-lg-3 shop-info-grid text-center mt-4">
            <div class="product-shoe-info shoe">
                <div class="men-thumb-item">

                    <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="{{ $product->name }}">

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
                    {{-- <ul class="stars">
                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                    </ul> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>

</br>
<!--//end might like product section-->