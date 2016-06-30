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

    public function scopeAdmin(){
        return $this->is_authorized;
    }

    public function scopeRegistrar(){
        return $this->is_registrar;
    }

    public function scopeActive(){
        return $this->active;
    }

    public function scopeInactive($query){
        return $query->whereActive(0);
    }

    public function scopeUser($query, $id){
        return $query->whereId($id);
    }
}
