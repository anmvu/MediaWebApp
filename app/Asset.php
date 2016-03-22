<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    $assets = Asset::all();

    public function assets(){
    	return $this->hasMany('App\Attribute');
    }
}
