<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCombinationImages extends Model
{   
    protected $fillable = ['url', 'group_combination_id'];

    public function group_combinations(){
        return $this->belongsTo(GroupCombination::class);
    }
}
