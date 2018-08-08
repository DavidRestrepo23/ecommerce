<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{   
    protected $fillable = ['price', 'price_tax', 'price_total', 'discount', 'product_id', 'ends_at', 'start_at'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
