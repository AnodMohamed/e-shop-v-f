<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\driver;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use PHPUnit\Framework\Test;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $weight;
    public $price;
    public $quantity;
    public $left_quantity;
    public $category_id;
    public $description;
    public $usage;
    public $store;
    public $recipe;
    public $image;
    public $images;

    public function generaleslug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'weight' => 'required|max:8',
            'price' => 'required|max:6',
            'quantity' => 'required|max:6',
            'left_quantity' => 'required|max:6',
            'description' => 'required',
            'category_id' => 'required',
            'usage' => 'required',
            'store' => 'required',
            'recipe' => 'required',
            'image'=>'required |mimes:jpg,jpeg,png',

        ]);
    }
    public function storeproduct(){

        $this->validate([
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'weight' => 'required|max:8',
            'price' => 'required|max:6',
            'quantity' => 'required|max:6',
            'left_quantity' => 'required|max:6',
            'description' => 'required',
            'category_id' => 'required',
            'usage' => 'required',
            'store' => 'required',
            'recipe' => 'required',
            'image'=>'required |mimes:jpg,jpeg,png',

        ]);
       

        $ad= new Product();
        $ad->name = $this->name;
        $ad->slug = $this->slug;
        $ad->weight = $this->weight;
        $ad->price = $this->price;
        $ad->quantity = $this->quantity;
        $ad->left_quantity = $this->left_quantity;
        $ad->description = $this->description;
        $ad->category_id = $this->category_id;
        $ad->usage = $this->usage;
        $ad->store = $this->store;
        $ad->recipe = $this->recipe;


        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName , 'public');
        $ad->image = $imageName;  
        
        if($this->images)
       {
           $imagesname = '';
      

          
           foreach($this->images as $key=>$img)
           {
            $image      = $img->getClientOriginalName();
            $imagesExtention  = time() . '.' . $key . '.'. $image;
            $img->storeAs('gallery',$imagesExtention, 'public');
            $imagesname = $imagesname . ',' . $imagesExtention ;
           }

           $ad->images =$imagesname;
       }

        $ad->save();
        session()->flash('message','Product has been created successfully!');
        return redirect()->route('admin.products');

    }

    
    public function render()
    {
        $categories =Category::all();
        return view('livewire.admin.add-product-component', ['categories'=>$categories])->layout('layouts.app');

    }
}
