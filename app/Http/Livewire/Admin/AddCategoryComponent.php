<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generaleslug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories'
        ]);
    }

    public function storeCategory(){

        $this->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories'
        ]);
        $category= new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','Category has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.add-category-component')->layout('layouts.app');
    }
}
