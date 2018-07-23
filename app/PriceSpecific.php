<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSpecific extends Model
{   
    protected $fillable = ['price','price_tax','discount','product_id', 'group_id'] ;

    protected $table = 'price_specifics';

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function group(){
        return $this->belongsTo(GroupUser::class);
    }
}
