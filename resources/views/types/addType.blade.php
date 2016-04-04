@extends('layouts.app')
@section('bar')
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
<div class='btn-toolbar' role='toolbar' aria-label='type-stuff'>
    <div class="btn-group" role="group" aria-label="type-stuff">
        <a href="{{url('/types')}}"><button type="button" class="btn btn-default">View Types</button></a>
        <a  href="{{url('types/add')}}"><button type="button" class="btn btn-default">Add Type</button></a>
        <a href="{{url('types/remove')}}"><button type="button" class="btn btn-default">Remove Types</button></a>
        <a href="{{url('types/edit')}}"><button type="button" class="btn btn-default">Edit Type</button></a>
    </div>
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
    $("button[name='commit']").click(function() {
        formmodified = 0;
    });
});
</script>
	<h1> Add Type Form </h1>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/addtype') }}">
		{{ csrf_field() }}
        <div class="form-group">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Type Name</label>
            <!-- <br/> -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dropdown">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                <button type="submit" name='commit' class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Add Type
                </button>

            </div>
        </div>
    </form>


@endsection