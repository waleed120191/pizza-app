<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Your cart</span>
</h4>
<ul class="list-group mb-3">
    @foreach ($basket_items as $item)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">{{$item->name}} ({{ $item->quantity }})</h6>
            </div>
            <span class="text-muted">€{{ $item->getPriceSum() }}</span>
        </li>
    @endforeach
    <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
            <h6 class="my-0">Delivery cost</h6>
        </div>
        <span class="text-success">+€{{$delivery_cost}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span>Total (EUR /USD)</span>
        <strong>€{{($subtotal_eur)}} / ${{$subtotal_usd}} </strong>
    </li>
</ul>