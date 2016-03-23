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

    }

    public function removeAsset(){
        return view('assets.removeAsset');
    }
}
