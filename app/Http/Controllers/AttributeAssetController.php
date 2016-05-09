<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset as Asset;
use App\Attribute as Attribute;
use App\AttributeAsset as AttAss;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttributeAssetController extends Controller
{
    
    public function showAttributes($id){
        $linked_attributes = AttAss::where('asset_id',$id)->get();
        $attributes = Attribute::notLinked($linked_attributes);
        $attribute_ids = Attribute::lists('id');
        return view('assets.attributes',['linked'=>$linked_attributes,'attributes'=>$attributes,'id'=>$id]);
    }

    public function linkAttributes(Request $request, $id){
		$link = new AttAss;
		$link->asset_id = $id;
		$link->attribute_id = $request->attribute;
		$link->value = $request->value;
		$link->save();
		return response()->json(['response'=>$link]);
    }

    public function removeAttributes(Request $request, $id){
    	$attribute = AttAss::where(['asset_id'=>$id,'attribute_id'=>$request->id]);
        $attribute->delete();
        return response()->json(['return' => $request->id]);
    }

    public function editLink(Request $request, $id,$attribute) {
    	$name = $request->get('name');
        $value = $request->get('value');
        return response()->json(['return' => AttAss::where(['asset_id'=>$id,'attribute_id'=>$attribute])->update([$name=>$value])]);
    }

}
