<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    // $assets = Asset::all();

    public function attributes(){
    	return $this->belongsToMany('App\Attribute','attribute_assets');
    }

    public function containedAssets(){
    	if($this->is_container){
    		$items = Asset::where('container_id' == $this->id);
    		return $items;
    	}
    }

    public function scoperoom($query){
        return $query->where('is_container',1);
    }
}
