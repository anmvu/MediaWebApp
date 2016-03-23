<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute as Attribute;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttributesController extends Controller
{
    public function index(){
    	$attributes = attribute::all();
    	return view('attributes.attributes',['attributes'=>$attributes]);
    }

    public function addattribute(){
    	return view('attributes.addattribute');
    }

    public function postattribute(){

    }

    public function removeattribute(){
        return view('attributes.removeattribute');
    }
}
