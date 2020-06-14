@extends('layouts.app')

@section('content')
    <div class="container text-center">

        <h1>Pizzas</h1>
        <br>

        <div class="row">
            @foreach ($allProducts as $product)

                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text text-muted">
                                {{$product->description}}
                            </p>
                        </div>
                        <div class="card-footer">
                        
                        </div>
                        <img src="{{ asset('images/'.$product->cover_img) }}" class="card-img-top"
                             alt="{{$product->name}}">
                        <div class="card-footer">
                            <form class="menu-form" action="{{ route('cart.add', $product->id) }}" data-id="{{$product->id}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <button type="submit" class="btn btn-primary btn-xs btn-block"
                                                id="item-{{$product->id}}-add">
                                            Add to basket
                                        </button>
                                        <button class="btn btn-primary btn-xs btn-block"
                                                id="item-{{$product->id}}-add-loader"
                                                type="button" style="display: none;" disabled="">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                  aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <strong>€ {{ $product->price }}</strong>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
