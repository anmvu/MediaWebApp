<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'is_authorized',
        'active',
        'first_name',
        'last_name',
        'phone_num',
    ];

    // public function create(array $data)
    // {
    //    return User::create([
    //       'is_authorized' => $data['is_authorized'],
    //       'active' => $data['active'],
    //       'first_name' => $data['firstName'],
    //       'last_name' => $data['lastName'],
    //       'phone_num' => $data['phone_num'],
    //       'user' => bcrypt($data['user']),
    //    ]);
    // }

    protected $hidden = [
        'user',
    ];

    public function isAdmin(){
        return $this->is_authorized;
    }
}
