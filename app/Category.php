<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   

    protected $fillable = ['name', 'slug', 'description', 'file', 'status'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
}
