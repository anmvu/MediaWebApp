<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Loans;
use App\Asset as Asset;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoansController extends Controller
{
    public function getLoanForm(){
    	$rooms = Asset::where('is_room',1);
    	
    	return view('loan',['rooms' => $rooms]);
    }

    public function postLoan(Request $request){
    	$this->validate($request->all(), [
            'item' => 'required|id',
            'due' => 'required|string',
            'email' => 'string',
           	'loaned' => 'required|string',
           	'room' => 'required|id',
           	'comments' => 'string',
        ]);
    }
}
