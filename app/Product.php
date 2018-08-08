<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name','price', 'original_price','description','vendor_id','category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    public function category(){
      return $this->belongsTo('App\Category', 'category_id');
    }

    public function vendor(){
      return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function productDetails(){
      return $this->hasMany('App\ProductDetail');
    }

    public function gallary(){
      return $this->hasMany('App\Gallary');
    }

    public static function getAll(){
        return self::paginate(9);
    }
    
}
