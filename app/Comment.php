<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function issue(){
    	return $this->belongsTo('App\Issue','issue_id');
    }

    //$comments = Comment::all();

}
