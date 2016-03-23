<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue as Issue;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IssuesController extends Controller
{
    public function listIssues(){
    	$needsWork = Issue::where('status','Needs Work');
    	$workingOn = Issue::where('status','In Progress');
    	return view('issues.issues',['needsWork'=>$needsWork,'workingOn'=>$workingOn]);
    }
}
