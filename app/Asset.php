<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    // $assets = Asset::all();

    public function attributes(){
    	return $this->hasMany('App\Attribute');
    }

    public function containedAssets(){
    	if($this->is_container){
    		$items = Asset::where('container_id' == $this->id);
    		return $items;
    	}
    }
}
