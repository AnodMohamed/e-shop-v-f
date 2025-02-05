<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ViewProductComponent extends Component
{
    public $product_id;
    public $images;

    public function mount($product_id)
    {

       $product = Product::Where('id',$product_id)->first(); 
       $this->images = $product->images;
       $this->product = $product;
    }
    public function render()
    {
        $cart = Cart::content();   
        $imagex = explode(',' ,$this->images);

        return view('livewire.view-product-component',['imagex'=>$imagex, 'cart'=>$cart])->layout('layouts.app');
    }
}
