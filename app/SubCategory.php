<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'file', 'category_id', 'status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
