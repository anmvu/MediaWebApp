<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DB;

class UsersController extends Controller
{
    public function index(){
    	$users = User::Active()->orderBy('id', 'DESC')->get();
    	return view('user.users',['users'=>$users]);
    }

    public function profile(){
    	$user = Auth::user();
    	return view('user.profile',['user'=>$user]);
    }

    public function addUser(){
    	return view('user.addUser');
    }

    public function postUser(Request $request){
        
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

        // DB::table('users')->insert([ //,
        //     'first_name' => $request->fname,
        //     'last_name' => $request->lname,
        //     'phone_num' => $request->phonenum,
        //     'is_authorized' => false,
        //     'user' => $request->user,
        //     'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        //     'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        // ]);

        return redirect('/users');
    }

    public function removeUser(){
        $users = User::Active()->get();
        return view('user.removeUser',['users'=>$users]);
    }

    public function removeSelectedUser(Request $request){
        $user = User::find($request->id);
        $user->update(array('active'=>0));
        //return redirect('/users/remove');
        return redirect('/users');
    }

    public function reactivateUser(){
        $users = User::Inactive()->get();
        return view('user.reactivateUser',['users'=>$users]);
    }
    public function reactivateSelectedUser(Request $request){
        $user = User::find($request->id);
        $user->update(array('active'=>1));
        return redirect('/users/reactivate');
    }
}
