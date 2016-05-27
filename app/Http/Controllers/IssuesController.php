<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue as Issue;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment as Comment;

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
}
