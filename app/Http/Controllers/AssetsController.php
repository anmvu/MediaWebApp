<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset as Asset;
use App\Http\Requests;
use App\Type as Type;
use App\AttributeAsset as Attass;
use App\User as User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use URL;
use Illuminate\Support\Facades\Request as URLRequest;
use DB;
use SearchIndex;

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
        return view('roomcheck.roomCheck');
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
            if(strpos($asset->type->name, 'Room') !== false){
                return response()->json(['status' =>'error','msg'=>"You can't put a room in anything"]);
            }
            if($asset->id == $value){
                return response()->json(['status' =>'error','msg'=>'Cannot make this its container!']);
            }
            else if($value == 0){ $value = NULL;}
        }
        $asset->$name = $value;
        return response()->json(['return' => $asset->save()]);
    }

    public function getTimeChecked($id){
        $time = Asset::where('id',$id)->get(['time_checked']);
        // \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Europe/Stockholm');
        $thebool = gettype($time[0]['time_checked']) != 'undefined';

        if(!is_null($time[0]['time_checked'])){
            $new = strtotime($time);
            $return = date('D M j g:i A');
            return response()->json(['return'=>$return]); 
        }
        return response()->json(['return'=> "Never"]);
    }

    public function getUser($id){
        $asset = Asset::findOrFail($id);
        if(!is_null($asset->user)){
            $user = $asset->user->first_name. " ". $asset->user->last_name;
            return response()->json(['return'=>$user]);
        }
        return response()->json(['return'=>"No one"]);
    }
    

    public function clearRoom(Request $request){
        $asset = Asset::findOrFail($request->room);
        $now = date('Y-m-d G:i:s');
        $asset->update(['time_checked'=>$now]);
        $time = strtotime($now);
        $return = date('D M j g:i A',$time);    
        $items = Asset::where('container_id',$request->room)->get();
        foreach($items as $item){
            $item->update(['time_checked'=>$now]);
            // return $item->id;
        }
        return response()->json(['return'=>$return]);
    }

    public function addComments($room, $selected){
        // print_r(URLRequest::url());
        $asset_ids = explode("+",$selected);
        $assets = array();
        $room_obj = Asset::findOrFail($room);
        $asset_string = "";
        foreach ($asset_ids as $asset_id){
            $asset = Asset::findOrFail($asset_id);
            if(!$asset || $asset->container_id!= $room){
                return redirect('errors.401');            
            }
            array_push($assets, $asset);
            $asset_string += $asset_id + "+";
        }
        return view('roomcheck.comments',["room" => $room_obj,"assets"=>$assets, "asset_string"=>$asset_string]);
    }

    public function roomStatus(){
        $room_query = DB::table('assets')
            ->join('types', 'assets.type_id', '=', 'types.id')
            ->select('assets.*', 'types.name')
            ->where('types.name','like','Room%')
            ->get();
        // print_r($rooms);
        $rooms = array();
        $room_items = array();
        foreach($room_query as $room){
            $asset = Asset::findOrFail($room->id);
            $items = array();
            foreach($asset->items as $item){
                $contained = Asset::findOrFail($item->id);
                array_push($items, $contained);
            }
            $id = $asset->id;
            $room_items[$id] = $items;
            array_push($rooms,$asset);
            // print_r($asset->items);
        }
        return view('rooms',['rooms'=>$rooms,'items'=>$room_items]);
        return response()->json(['rooms'=>$rooms,'items'=>$room_items]);
    }

    public function findRooms(Request $request){
        $items = $request->items;
        $room_items = array();
        for($i = 0; $i < sizeof($items); $i++){
            $this_item = array();
            $asset = Asset::where('type_id',$items[$i])->get(['container_id']);
            foreach($asset as $room) array_push($this_item,$room);
            if($i == 0) $room_items = $this_item;
            else {$room_items = array_intersect($room_items,$this_item);}
        }
        return response()->json(['rooms'=>$room_items]);
    }

}
