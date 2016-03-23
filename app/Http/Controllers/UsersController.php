<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class UsersController extends Controller
{
    public function index(){
    	$users = User::all();
    	return view('user.users',['users'=>$users]);
    }

    public function profile(){
    	$user = Auth::user();
    	return view('user.profile',['user'=>$user]);
    }

    public function addUser(){
    	return view('user.addUser');
    }

    public function postUser(){

    }

    public function removeUser(){
        return view('user.removeUser');
    }
}
