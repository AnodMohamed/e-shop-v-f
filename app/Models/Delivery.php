<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    public function driver() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

}
