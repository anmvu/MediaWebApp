<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
	// $issues = Issues::all();

	public function comments(){
		return $this->hasMany('App\Comment','issue_id','id');
	}

    public function asset(){
    	return $this->hasOne('App\Asset','id','asset_id');
	}

	public function user(){
    	return $this->hasOne('App\User','id','user_id');
	}
}
