<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;
    public $product_slug;
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
    public $new_image;
    public $new_images;
    public $image;
    public $images;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->weight = $product->weight;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->left_quantity = $product->left_quantity;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->usage = $product->usage;
        $this->store = $product->store;
        $this->recipe = $product->recipe;
        $this->image = $product->image;
        $this->images = $product->images;

    }
    public function generaleslug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'weight' => 'required|max:8',
            'price' => 'required|max:6',
            'quantity' => 'required|max:6',
            'left_quantity' => 'required|max:6',
            'description' => 'required',
            'category_id' => 'required',
            'usage' => 'required',
            'store' => 'required',
            'recipe' => 'required',
            'new_image'=>'nullable |mimes:jpg,jpeg,png',

        ]);
    }

    public function updateProduct(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'weight' => 'required|max:8',
            'price' => 'required|max:6',
            'quantity' => 'required|max:6',
            'left_quantity' => 'required|max:6',
            'description' => 'required',
            'category_id' => 'required',
            'usage' => 'required',
            'store' => 'required',
            'recipe' => 'required',
            'new_image'=>'nullable |mimes:jpg,jpeg,png',

        ]);
       

        $ad= Product::where('slug', $this->product_slug)->first();
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


        if($this->new_image){

            $imageName      = $this->new_image->getClientOriginalName();
            $imageExtention  = time() . '.' . $imageName;
            $this->new_image->storeAs('products',$imageExtention, 'public');
            $ad->image = $imageExtention;
        }

        if($this->new_images)
        {
            $imagesname = '';
            foreach($this->new_images as $key=>$img)
            {
             $image      = $img->getClientOriginalName();
             $imagesExtention  = time() . '.' . $key . '.'. $image;
             $img->storeAs('gallery',$imagesExtention, 'public');
             $imagesname = $imagesname . ',' . $imagesExtention ;
            }
            $ad->images =$imagesname;
        }

        $ad->update();
        session()->flash('message','Product has been edited successfully!');
        return redirect()->route('admin.products');



    }

    public function render()
    {
        $categories =Category::all();
        $imagex = explode(',' ,$this->images);

        return view('livewire.admin.edit-product-component', ['categories'=>$categories , 'imagex'=>$imagex])->layout('layouts.app');
    }
}
