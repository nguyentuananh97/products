<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{
   public function product(){
      return $this->belongsTo('App\Product', 'product_id');
    }
    public function getAll(){
      return self::paginate(16);
    }
}
