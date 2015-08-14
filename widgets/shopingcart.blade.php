<div id="shopping-cart" class="fr">
    <a href="{{url('checkout')}}" class="cart-block" title="Checkout">
        <span class="ttl-cart">{{Shpcart::cart()->total_items()}} <strong>items</strong></span><br>
        <span class="text-cart">on your cart</span>
    </a>
    <button class="cart-btn">Checkout &gt;</button>
</div>