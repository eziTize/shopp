@extends('partials.base2')

@section('content')

    <div class="container mt-4">
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

    <div class="thank-you-section ">
        <h1>Thank you for <br> Your Order!</h1>
        <p>A confirmation email was sent</p>
        <div class="spacer"></div>
        <div>
            <a href="{{ url('/dashboard') }}" class="button">Check Dashboard</a>
        </div>
    </div>

    <style>
        .thank-you-section {
            padding-top: 7%;
            padding-bottom: 10%;
            position: relative;
        }

    </style>
@endsection