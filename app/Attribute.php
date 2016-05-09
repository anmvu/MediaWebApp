<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    // $attributes = Attribute::all();
    public function assets(){
    	return $this->belongsToMany('App\Asset','attribute_assets');
    }

    public function scopeEnabled(){
        return $this->is_enabled;
    }

    public static function notLinked($linked){
    	$ids = array();
    	foreach ($linked as $link){
    		array_push($ids,$link['attribute_id']);
    	}
    	return Attribute::whereNotIn('id',$ids)->orderBy('label')->get();
    }

}
