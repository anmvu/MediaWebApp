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

        	$priority = $asset_id."_priority";
            
            $asset = Asset::findOrFail($asset_id);
            $asset->update(['has_problems'=>1]);
            $asset->container->update(['has_problems'=>1]);
            


            $issue = new Issue;
            $issue->asset_id = $asset_id;
            $issue->user_id = $request->user_id;
            $issue->priority = $request->$priority;
            $issue->status = "Needs Work";
            $issue->save();

            $comment = new Comment;
            $comment->issue_id = $issue->id;
            $comment->comment = $request->$asset_id;
            $comment->is_problem = true;
            $comment->save();
        }
        if(!$comment->save() || !$issue->save())
        return redirect('/roomcheck');
    }

    public function addComment(Request $request, $id){
        $issue = Issue::findOrFail($id);
        $comment = new Comment;
        $comment->issue_id = $id;
        $comment->comment = $request->comment;
        $comment->is_problem = $request->problem;
        $comment->save();
        $created_on = date('D M j g:i:s',strtotime($comment->created_at));
        return response()->json(['id'=>$comment->id,'created_on'=>$created_on]);
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

    public function seeIssue($id){
        $issue = Issue::findOrFail($id);
        $comments = Comment::where('issue_id',$id)->get();
        return view('issues.singleIssue',['issue'=>$issue,'comments'=>$comments]);
    }

    public function editIssue(Request $request, $id) {
        $issue = Issue::findOrFail($id);
        $name = $request->get('name');
        $value = $request->get('value');
        $issue->$name = $value;
        $status = $issue->save();
        if ($value == 'Solved'){
            $asset = $issue->asset;
            $issues = $asset->issues;
            foreach($issues as $issue){
                if($issue->status != 'Solved')
                    return response()->json(['return' => $status,'status' => $value]);
            }
            $asset->has_problems = 0;
        }
        return response()->json(['return' => $status,'status' => $value]);
    }
}

