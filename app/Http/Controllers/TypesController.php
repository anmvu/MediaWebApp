<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type as Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class TypesController extends Controller
{
    public function index(){
    	$types = Type::enabled()->get();
        $max = Type::all()->max('id');
        $middle = $max/2;
    	return view('types.types',['types'=>$types,'max'=>$max,'mid'=>$middle]);
    }

    public function profile(){
    	$type = Auth::type();
    	return view('types.profile',['type'=>$type]);
    }

    public function addtype(){
    	return view('types.addtype');
    }

    public function posttype(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/types/add')
                ->withInput()
                ->withErrors($validator);
        }

        $type = new Type;
        $type->name = $request->name;
        $type->save();

        return redirect('/types');
    }

    public function removetype(Request $request){
        $type = Type::find($request->id);
        $type->update(['enable'=>0]);
        return response()->json(['return' => $request->id]);
    }
}
