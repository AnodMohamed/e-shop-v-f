<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $category = '';


    public function render()
    {
        $cart = Cart::content();   

        return view('livewire.home-component',
         ['products' => Product::search($this->search)
                ->Where('stauts','1')
                ->Where('left_quantity','<>', 0)
                ->simplePaginate(10)

            ,'Categories' => Category::all()
            ,'cart' =>  $cart
        ])->layout('layouts.base');
    }
}
