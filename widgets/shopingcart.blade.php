<div id="shopping-cart" class="fr">
    <a href="{{url('checkout')}}" class="cart-block" title="Checkout">
        <span class="ttl-cart">{{Shpcart::cart()->total_items()}}&nbsp;<strong>items</strong></span><br>
        <span class="text-cart">on your cart</span>
    </a>
    <a class="cart-btn" href="{{url('checkout')}}">Checkout &gt;</a>
</div>