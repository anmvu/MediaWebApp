@extends('layouts.app')
@include('user.userBar')
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
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/types/add') }}">
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