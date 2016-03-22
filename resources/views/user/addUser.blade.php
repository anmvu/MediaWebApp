@extends('layouts.app')
@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='user-stuff'>
    <div class="btn-group" role="group" aria-label="user-stuff">
        <a  href="{{url('/adduser')}}"><button type="button" class="btn btn-default">Add User</button></a>
        <a href="{{url('/removeuser')}}"><button type="button" class="btn btn-default">Remove Users (Make Inactive)</button></a>
        <a href="{{url('/edituser')}}"><button type="button" class="btn btn-default">Edit User</button></a>
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
});
</script>
	<h1> Add User Form </h1>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/adduser') }}">
		{{ csrf_field() }}
        <div class="form-group">

            <label class="col-md-4 control-label">Item</label>
            <!-- <br/> -->
            <div class="col-md-4 dropdown">
                <input type="text" class="form-control" name="item" value="{{ old('item') }}"> 
            </div>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Due</label>
            <!-- <br/> -->
            <div class="col-md-4">
            	<div class="well">
	            	<div id="datetimepicker2" class="input-append">
					    <input data-format="MM/dd/yyyy HH:mm:ss PP" type="text"></input>
					    <span class="add-on">
					      <i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar">
					      </i>
					    </span>
					</div>
				</div>
			</div>
				<script type="text/javascript">
				  $(function() {
				    $('#datetimepicker2').datetimepicker({
				      language: 'en',
				      pick12HourFormat: true
				    });
				  });
				</script>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Loaner's Email</label>
            <!-- <br/> -->
            <div class="col-md-4">
               <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Loaner's Name</label>
            <!-- <br/> -->
            <div class="col-md-4">
                <input type="text" class="form-control" name="loaned" value="{{ old('loaned') }}">
            </div>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Room</label>
            <!-- <br/> -->
            <div class="col-md-4">
            	<select name="room">
            		@foreach ($rooms as $room)
					    <option value="{{$room->id}}">{{$room->barcode}}</option
					@endforeach
            	</select>
            </div>
        </div>
        <div class="form-group">

            <label class="col-md-4 control-label">Comments Before (if expensive)</label>
            <!-- <br/> -->
            <div class="col-md-4">
            	<input type="textbox" class="form-control" name='comment' value="{{old('comment')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Submit Loan
                </button>

            </div>
        </div>
    </form>


@endsection