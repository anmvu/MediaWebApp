@extends('layouts.app')
@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='type-stuff'>
    <div class="btn-group" role="group" aria-label="type-stuff">
        <a href="{{url('/types')}}"><button type="button" class="btn btn-default">View Types</button></a>
        <a  href="{{url('types/add')}}"><button type="button" class="btn btn-default">Add Type</button></a>
        <a href="{{url('types/remove')}}"><button type="button" class="btn btn-default">Remove Types</button></a>
        <a href="{{url('types/edit')}}"><button type="button" class="btn btn-default">Edit Type</button></a>
    </div>
</div>
@endsection
@section('content')
<script>
$(document).ready(function() {
    formmodified=0;
    $('form *').change(function(){
        formmodified=1;
    });
    window.onbeforeunload = confirmExit;
    function confirmExit() {
        if (formmodified == 1) {
            return "New information not saved. Do you wish to leave the page?";
        }
    }
    $("input[name='commit']").click(function() {
        formmodified = 0;
    });
});
</script>
	<h1> Add Type Form </h1>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/addtype') }}">
		{{ csrf_field() }}
        <div class="form-group">

            <label class="col-md-4 control-label">First Name</label>
            <!-- <br/> -->
            <div class="col-md-4 dropdown">
                <input type="text" class="form-control" name="fname" value="{{ old('fname') }}"> 
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Last Name</label>
            <div class="col-md-4 dropdown">
                <input type="text" class="form-control" name="lname" value="{{ old('lname') }}"> 
            </div>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Phone Number</label>
            <!-- <br/> -->
            <div class="col-md-4">
               <input type="text" class="form-control" name="phonenum" pattern="\d{7}" title="Enter 10 digit phone number" value="{{ old('phonenum') }}">
            </div>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Is Authorized</label>
            <!-- <br/> -->
            <div class="col-md-1 col-md-offset-1 radio">
                <label>
                    <input type="radio" name="authorized" id="optionsRadio1" value="1" checked>
                    Yes
                </label>
            </div>
            <div class="col-md-1 radio">
                <label>
                    <input type="radio" name="authorized" id="optionsRadio2" value="0">
                    No
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">N number(Authorized) or Barcode(Student)</label>
            <div class="col-md-4">
            	<input type="textbox" class="form-control" name='type' value="{{old('type')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" name='commit' class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Add type
                </button>

            </div>
        </div>
    </form>


@endsection