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

            <!-- search-container -->
            <div class="search-container container">

                <h1>Search Results</h1>
                <p class="search-results-count">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p>

                @if ($products->total() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></th>
                                <td>{!! $product->details !!}</td>
                                <td>€{{ number_format($product->price, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $products->appends(request()->input())->links() }}
                @endif

            </div>
    </section>
    <!-- /search-container -->

@endsection