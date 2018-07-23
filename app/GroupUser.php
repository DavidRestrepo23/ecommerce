<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = "group_users";

    public function users(){
        return $this->hasMany(User::class);
    }

    public function price_specific(){
        return $this->hasOne(PriceSpecific::class);
    }

}
