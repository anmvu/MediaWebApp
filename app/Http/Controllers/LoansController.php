<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Loan as Loan;
use App\Asset as Asset;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LoansController extends Controller
{
    public function getLoanForm(){
    	$rooms = Asset::room()->enabled()->orderBy('barcode')->get();
    	
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

        if ($validator->fails()) {
            return redirect('/loan')
                ->withInput()
                ->withErrors($validator);
        }

        // DB::table('loans')->insert([ //,
        //     'asset_id' => $request->item,
        //     'user_id' => $request->user()->id,
        //     'comment_before' => $request->comments,
        //     'due' => $request->due,
        //     'is_returned' => false,
        //     'email' => $request->email,
        //     'loaned_to' => $request->loaned,
        //     'container_id' => $request->room,
        //     'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        //     'update_at' => \Carbon\Carbon::now()->toDateTimeString(),
        // ]);

        $loan = new Loan;
        $loan->asset_id = $request->item;
        $loan->user_id = $request->user()->id;
        $loan->comment_before = $request->comments;
        $loan->due = $request->due;
        $loan->is_returned = false;
        $loan->email = $request->email;
        $loan->loaned_to = $request->loaned;
        $loan->container_id = $request->room;

        $loan->save();

        return redirect('/loan');
    }

    public function needReturning(){
        $items = Loan::where('is_returned',0);
        return view('return',['items'=>$items]);
    }
}
