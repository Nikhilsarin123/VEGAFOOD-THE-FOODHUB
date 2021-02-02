<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderDish extends Model
{
    //
     protected $table = 'order_dish';
     protected $guarded = [];

     public function user()
     {
     	return $this->belongsTo(User::class);
     }

     public function dish()
     {
     	return $this->belongsToMany(Dish::class)->withPivot('quantity');
     }
}
