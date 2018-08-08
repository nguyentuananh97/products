<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
         'name'
    ];
    public function productDetail(){
      return $this->hasMany('App\ProductDetail');
    }
}
