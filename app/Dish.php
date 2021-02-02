<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
     protected $guarded = [];
     public function Restaurant()
     {
     	 return $this->belongsTo(Restaurant::class);
     }


    //
}
