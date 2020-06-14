@extends('layouts.app')


@section('content')

    <h2>Checkout</h2>

    <h3>Delivery Information</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-sm-auto col-lg-6">
            @include ('cart.partials.order')
        </div>
        <div class="col-md-6 col-sm-auto col-lg-6 mt-3">
            @include ('cart.partials.info')
        </div>
    </div>

@endsection
