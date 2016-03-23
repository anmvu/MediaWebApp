<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
	// $issues = Issues::all();

	public function comments(){
		return $this->hasMany('App\Comment');
	}
}
