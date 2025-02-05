<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use function PHPSTORM_META\elementType;

class CartController extends Controller
{
    public function add(Request $request){
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add(
        $product->id,
        $product->name,
        $request->input(key:'quantity'),
        $product->price,
               );
        session()->flash('message', 'product added successfully.');
        return redirect()->back();

    }
    public function updatequantity(Request $request){
        $rowId = $request->input('rowId');
        $qty =   $request->input('quantity');
        $left_quantity = $request->input('left_quantity');

        if($left_quantity >=  $qty){
            Cart::update($rowId, ['qty' => $qty]); // Will update the quantity  
            session()->flash('message', 'product added successfully.');

        }elseif($left_quantity <  $qty){
            session()->flash('error', 'the left quantity not equal the required quantity ');
        }
        return redirect()->back();

    }
    public function delete(Request $request){
        $rowId = $request->input('rowId');
        Cart::remove($rowId);
        session()->flash('message', 'product deleted successfully.');
        return redirect()->back();

    }
    
    public function empty(){
        Cart::destroy();
        session()->flash('message', 'Cart emptied successfully.');
        return redirect()->back();
    }
    
}
