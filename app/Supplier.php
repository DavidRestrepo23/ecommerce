<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{   
    protected $fillable = ['contactName', 'companyName', 'telephone', 'mobile', 'web', 'email', 'description', 'address', 'country', 'city', 'municipaly', 'neighborhood', 'logo', 'observations'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
