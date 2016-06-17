<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue as Issue;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment as Comment;
use App\Asset as Asset;

class IssuesController extends Controller
{
    public function listIssues(){
    	$needsWork = Issue::where('status','Needs Work')->get();
    	$workingOn = Issue::where('status','In Progress')->get();
        // print_r($needsWork);
        // foreach($needsWork as $need)print_r($need->comments);
    	return view('issues.issues',['needsWork'=>$needsWork,'workingOn'=>$workingOn]);
    }

    public function submitComments(Request $request,$room,$selected){
        $asset_ids = explode("+",$selected);
        foreach($asset_ids as $asset_id){

        	$priority = $asset_id +"_priority";
            
            $asset = Asset::findOrFail($asset_id);
            $asset->update(['has_problems'=>1]);
            $asset->container->update(['has_problems'=>1]);
            

            $issue = new Issue;
            $issue->asset_id = $asset_id;
            $issue->user_id = $request->user_id;
            $issue->priority = $priority;
            $issue->status = "Needs Work";
            $issue->save();

            $comment = new Comment;
            $comment->issue_id = $issue->id;
            $comment->comment = $request->$asset_id;
            $comment->is_problem = true;
            $comment->save();
        }
        return redirect('/roomcheck');
    }

    public function showIssues($asset_id){
        $issues = Issue::where('asset_id',$asset_id)->get();
        $asset = Asset::findOrFail($asset_id);
        $containers = Asset::where('is_container',1)->get();
        $rooms = array();
        foreach($containers as $room){
            if(strstr($room->type->name, 'Room') != false){
                array_push($rooms,$room);
            }
        }
        return view('issues.assetIssues',['issues'=>$issues,'asset'=>$asset,'id'=>$asset_id,'rooms'=>$rooms]);
    }
}

