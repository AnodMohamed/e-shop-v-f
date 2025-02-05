<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsComponent extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $category = '';

    public function render()
    {
        $cart = Cart::content();   

        return view('livewire.products-component',[
                    'products' => Product::search($this->search)
                    ->where('stauts', 1 )
                    ->where('category_id', $this->category )
                    ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                    ->simplePaginate($this->perPage)
                    ,'Categories' => Category::all()
                    ,'cart' => $cart])->layout('layouts.app');
    }
}
