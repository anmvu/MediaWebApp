<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    proteched fillable() = [
        'is_authorized',
        'active',
        'first_name',
        'last_name',
        'phone_num',
        'user',
    ];

    public function isAdmin(){
        return $this->is_authorized;
    }
}
