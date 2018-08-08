<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','product_id', 'size_id','color_id', 'gallary_id','quantity'
    ];

    public function product(){
      return $this->belongsTo('App\Product', 'product_id');
    }

    public function size(){
      return $this->belongsTo('App\Size', 'size_id');
    }

    public function color(){
      return $this->belongsTo('App\Color', 'color_id');
    }
    
}
