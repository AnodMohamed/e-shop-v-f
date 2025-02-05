<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShippingCartComponent extends Component
{

    public function render()
    {
        $cart = Cart::content();   

      //  dd($cart);
        return view('livewire.shipping-cart-component',['cartItems'=>$cart])->layout('layouts.app');
    }
}
