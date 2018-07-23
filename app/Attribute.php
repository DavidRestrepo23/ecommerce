<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name'];

    public function attribute_details(){
        return $this->hasMany(AttributeDetail::class);
    }
}
