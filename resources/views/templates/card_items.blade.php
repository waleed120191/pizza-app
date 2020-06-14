<ul class="shopping-cart-items">
    @foreach (\Cart::getContent() as $item)
        @include('templates/cart_item')
    @endforeach
    @if(!Cart::isEmpty())
        <a href="{{route('cart.checkout')}}" class="btn btn-info" id="checkout">Checkout</a>
    @endif
</ul>
