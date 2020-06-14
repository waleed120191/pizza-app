<li class="row shopping-cart-item">
    <div class="col-5">
        <span class="item-name">{{ $item->name }}</span>
        <span class="item-price">€{{ $item->getPriceSum() }}</span>
    </div>
    <div class="col-5">
        <div class="btn-group" role="group" aria-label="Basic example">
            <form action="{{route('cart.update', $item->id)}}" method="post">
                @csrf
                <button type="button" class="btn btn-danger change_count minus">-</button>
                <span class="item-quantity mr-2 ml-2 pt-2">{{ $item->quantity }}</span>
                <button type="button" class="btn btn-success change_count plus">+</button>
                <input type="hidden" value="{{ $item->quantity }}" name="quantity">
            </form>
        </div>
    </div>
    <div class="col-2">
        <a href="{{route('cart.destroy', $item->id)}}" data-token="{{ csrf_token() }}" class="remove_item">
            <i class="fas fa-trash fa-lg"></i>
        </a>
    </div>
</li>
