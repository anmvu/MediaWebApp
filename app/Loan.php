<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function asset(){
    	return $this->hasOne('App\Asset','id','asset_id');
    }

    public function container(){
        return $this->hasOne('App\Asset','id','container_id');
    }

    public function loanable(){
    	return $this->belongsTo('App\Asset','asset_id');
    }
}
