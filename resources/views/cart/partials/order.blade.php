<form action="{{route('orders.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="shipping_fullname" value="{{ old('shipping_fullname') }}"
               class="form-control">
    </div>

    <div class="form-group">
        <label for="">Full Address</label>
        <input type="text" name="shipping_address" value="{{ old('shipping_address') }}"
               class="form-control">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Mobile</label>
        <input type="text" name="shipping_phone" value="{{ old('shipping_phone') }}" class="form-control">
    </div>
    <h4>Payment option</h4>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" value="cash_on_delivery">
            Cash on delivery
        </label>
    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" value="card">
            Card
        </label>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Place Order</button>
</form>