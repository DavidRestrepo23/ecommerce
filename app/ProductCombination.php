<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCombination extends Model
{   
    protected $fillable = ['combination', 'key_color' ,'stock', 'reference', 'price' , 'prixe_tax', 'discount', 'images' ,'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(ProductCombinationImages::class);
    }
}
