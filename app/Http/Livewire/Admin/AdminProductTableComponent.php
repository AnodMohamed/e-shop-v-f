<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductTableComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $stauts = '0';
    public $category = '';


    public function deleteproduct($id)
    {
        $product =Product::find($id);
        $product->delete();
        session()->flash('message','product has been deleted successfully!');
        return redirect()->route('admin.products');

    }

    

    public function publishproduct($id)
    {
        $product =Product::find($id);
        $product->stauts = '1';
        $product->save();
        session()->flash('message','product has been published successfully!');
        return redirect()->route('admin.products');

   
    }

    
    public function hiddenproduct($id)
    {
        $product =Product::find($id);
        $product->stauts = '0';
        $product->save();
        session()->flash('message','product has been hiddened successfully!');
        return redirect()->route('admin.products');

   
    }

    
    public function render()
    {
        return view('livewire.admin.admin-product-table-component', [
            'products' => Product::search($this->search)
                ->orWhere('category_id', 'like', '%'.$this->category.'%')
                ->where('stauts', $this->stauts )
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage)
                ,'Categories' => Category::all()])->layout('layouts.app');
    }
}
