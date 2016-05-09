<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute as Attribute;
use App\Http\Requests;
use App\Type as Type;
use App\Http\Controllers\Controller;
use Validator;

class AttributesController extends Controller
{
    public function index(){
    	$attributes = Attribute::enabled()->get();
    	return view('attributes.attributes',['attributes'=>$attributes]);
    }

    public function addAttribute(){
    	return view('attributes.addAttribute');
    }

    public function postAttribute(Request $request){
        $validator = Validator::make($request->all(), [
            'label' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/attributes/add')
                ->withInput()
                ->withErrors($validator);
        }

        $attribute = new Attribute;
        $attribute->label = $request->label;
        $attribute->save();
        return redirect('/attributes/add');
    }

    public function removeAttribute(Request $request){
        // $attribute = Attribute::find($request->id);
        Attribute::find($request->id)->update(['enabled'=>0]);
        // $attribute->update(['enabled' => 0]);
        return response()->json(['return' => $request->id]);
    }

    public function editAttribute(Request $request, $id) {
        $attribute = Attribute::findOrFail($id);
        $name = $request->get('name');
        $value = $request->get('value');
        $attribute->$name = $value;
        return response()->json(['return' => $attribute->save()]);
    }

}
