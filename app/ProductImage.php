<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{   

    protected $fillable = ['name', 'url', 'special', 'product_id'];

    protected $table = 'product_images';

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
