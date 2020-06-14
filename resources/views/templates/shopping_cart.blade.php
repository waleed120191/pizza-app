<div class="container shopping-wrapper">
    <div class="shopping-cart" style="display: none;">
        <div class="shopping-cart-header">
            <div class="shopping-cart-total">
                <span class="lighter-text">SubTotal:</span>
                <span class="main-color-text">€{{\Cart::getSubTotal()}}</span>
            </div>
        </div>
            <div id="main_cart">
                @include('templates/card_items')
            </div>
    </div>
</div>
