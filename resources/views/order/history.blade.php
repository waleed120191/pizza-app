@extends('layouts.app')


@section('content')
    <div class="container bg-light border pb-2">
        <nav class="navbar navbar-light ">
            <form class="form-inline">
                <input class="form-control mr-sm-2" name="email" type="text" value="{{request()->get('email')}}" placeholder="Enter the email">
                <button  class="btn btn-primary" type="submit">Search</button>
            </form>
        </nav>
        <div id="accordion" role="tablist">
            @foreach($orders as $order)
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <span class="badge badge-primary badge-pill incat-count">{{$order->item_count}}</span>
                        <a data-toggle="collapse" href="javascript:;" aria-expanded="true" aria-controls="collapseOne">
                            Order number: {{$order->order_number}} Total: € {{$order->grand_total}}
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-body p-0">
                            <ul class="list-group cat-list">
                                @foreach($order->items as $item)
                                    <li class="list-group-item">{{$item->name}} ({{$item->pivot->quantity}}) €{{$item->pivot->price}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
