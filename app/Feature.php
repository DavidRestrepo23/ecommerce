<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{   

    protected $fillable = ['name'];

    public function feature_details(){
        return $this->hasMany(FeatureDetail::class);
    }
}
