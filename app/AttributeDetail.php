<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeDetail extends Model
{
    protected $fillable = ['name', 'hexa' ,'attribute_id'];

    protected $table = 'attribute_details';

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
