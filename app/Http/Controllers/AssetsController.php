<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset as Asset;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssetsController extends Controller
{
    public function index(){
    	$assets = Asset::all();
    	return view('assets.assets',['assets'=>$assets]);
    }

    public function addAsset(){
    	return view('assets.addAsset');
    }

    public function postAsset(){
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

        $user = new Asset;
        $user->barcode = $request->fname;
        $user->type_id = $request->lname;
        $user->time_checked = $request->phonenum;
        $user->container_id = $request->authorized;
        $user->is_container = $request->user;
        $user->save();
    }

    public function removeAsset(){
        return view('assets.removeAsset');
    }
}
