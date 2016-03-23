<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type as Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    public function index(){
    	$types = type::all();
    	return view('types.types',['types'=>$types]);
    }

    public function profile(){
    	$type = Auth::type();
    	return view('types.profile',['type'=>$type]);
    }

    public function addtype(){
    	return view('types.addtype');
    }

    public function posttype(){

    }

    public function removetype(){
        return view('types.removetype');
    }
}
