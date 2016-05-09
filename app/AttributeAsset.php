<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeAsset extends Model{

	public function scopeUser($query, $id){
        return $query->where('asset_id',$id);
    }

    public function attribute(){
    	return $this->hasOne('App\Attribute','id','attribute_id');
    }

}
