<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = [
       'name',
       'slug',
       'weight',
       'price',

       'quantity',
       'left_quantity',
       'category_id',
       'description',

       'usage',
       'store',
       'recipe',
       'image',

       'images',
       'category_id',

   ];
   public static function search($search)
   {
       return empty($search) ? static::query()
           : static::query()->where('id', 'like', '%'.$search.'%')
               ->orWhere('name', 'like', '%'.$search.'%')
               ->orWhere('slug', 'like', '%'.$search.'%')
               ->orWhere('weight', 'like', '%'.$search.'%')
               ->orWhere('price', 'like', '%'.$search.'%')
               ->orWhere('quantity', 'like', '%'.$search.'%')
               ->orWhere('left_quantity', 'like', '%'.$search.'%')
               ->orWhere('description', 'like', '%'.$search.'%')
               ->orWhere('usage', 'like', '%'.$search.'%')
               ->orWhere('store', 'like', '%'.$search.'%')
               ->orWhere('recipe', 'like', '%'.$search.'%');
   }

   public function category() {
       return $this->belongsTo(Category::class, 'category_id', 'id');
   }
}
