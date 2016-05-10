<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset as Asset;
use App\Http\Requests;
use App\Type as Type;
use App\AttributeAsset as Attass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class AssetsController extends Controller
{
    public function index(){
    	$assets = Asset::enabled()->get();
    	return view('assets.assets',['assets'=>$assets]);
    }

    public function addAsset(){
        $rooms = Asset::where('is_container',1)->orderBy('barcode')->get();
        $types = Type::orderBy('name')->get();
    	return view('assets.addAsset',['types'=>$types,'rooms'=>$rooms]);
    }

    public function postAsset(Request $request){
        $validator = Validator::make($request->all(), [
            'barcode' => 'required|unique:assets',
            'type' => 'required',
            'room' => 'required',
            'is_container' => 'required',
            'loanable'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('/assets/add')
                ->withInput()
                ->withErrors($validator);
        }

        $asset = new Asset;
        $asset->barcode = $request->barcode;
        $asset->type_id = $request->type;
        $asset->container_id = $request->room;
        $asset->is_container = $request->is_container;
        $asset->loanable = $request->loanable;
        $asset->save();
        return redirect('assets/add');
    }

    public function showRooms(){
        // $rooms = Asset::where('is_container',1)->get();
        // print_r($rooms);
        // foreach($rooms as $room){
        //     $type = $room['type_id'];
        //     $checked = $room['time_checked'];
        //     $classroom[$room['barcode']] =[
        //         ['type_id'] => $type,
        //         ['time_checked'] => $checked,
        //     ];
        // }
        return view('roomCheck');
    }

    public function clearRoom($id){
        $room = Asset::findOrFail($id);
        $room->time_checked = \Carbon\Carbon::now()->toDateTimeString();
        $room->save();
        print_r($room);
        // return redirect('/roomcheck');
    }


    public function removeAsset(Request $request){
        $asset = Asset::find($request->id);
        $asset->update(['enabled'=>0]);
        return response()->json(['return' => $request->id]);
    }

    public function editAsset(Request $request, $id) {
        $asset = Asset::findOrFail($id);
        $name = $request->get('name');
        $value = $request->get('value');
        if($name == 'container_id'){
            if($asset->barcode == $value){
                print_r('error');
                return response()->json(['return'=>'Cannot make this a container!','status'=> 0]);
            }
            else if($value == 0){ $value = NULL;}
        }
        $asset->$name = $value;
        return response()->json(['return' => $asset->save()]);
    }


}
