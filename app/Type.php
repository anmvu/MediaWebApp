<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // $types = Type::all();
    public function scopeEnabled(){
        return $this->is_enabled;
    }
}
