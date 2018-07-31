<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCombination extends Model
{   
    protected $fillable = ['color', 'product_id'];
    
    public function combination_images(){
        return $this->hasMany(GroupCombinationImages::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
