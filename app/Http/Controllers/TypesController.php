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

    public function removetype(){
        return view('types.removetype');
    }
}
