<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
   
 protected $guarded = [];


 public function Dish()
 {
  return $this->hasMany(Dish::class);	
 }
}
