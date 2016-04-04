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
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'phonenum' => 'required',
            'authorized' => 'required',
            'user' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/users/add')
                ->withInput()
                ->withErrors($validator);
        }

        $user = new User;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->phone_num = $request->phonenum;
        $user->is_authorized = $request->authorized;
        $user->user = $request->user;
        $user->save();
    }

    public function removeattribute(){
        return view('attributes.removeattribute');
    }
}
