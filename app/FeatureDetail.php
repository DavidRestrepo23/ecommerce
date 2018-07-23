<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureDetail extends Model
{   

    protected $fillable = ['name', 'feature_id'];

    protected $table = 'feature_details';

    public function feature(){
        return $this->belongsTo(Feature::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
