<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCombination extends Model
{   
    protected $fillable = ['combination', 'key_color' ,'stock', 'reference', 'price' , 'price_tax', 'discount', 'product_id', 'group_combination_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(ProductCombinationImages::class);
    }

    public function group_combination_color(){
        return $this->belongsTo(GroupCombinationColor::class);
    }
}
