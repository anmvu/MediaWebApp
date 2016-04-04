<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    // $attributes = Attribute::all();
    public function assets(){
    	return $this->belongsToMany('App\Asset','attribute_assets')
    }
}
