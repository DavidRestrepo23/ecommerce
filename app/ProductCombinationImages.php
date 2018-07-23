<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCombinationImages extends Model
{
    public function product_combinations()
    {
        return $this->belongsTo(ProductCombination::class);
    }
}
