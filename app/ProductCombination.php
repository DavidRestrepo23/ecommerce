<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCombination extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(ProductCombinationImages::class);
    }
}
