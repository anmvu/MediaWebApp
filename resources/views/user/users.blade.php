@extends('layouts.app')

@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='user-stuff'>
    <div class="btn-group" role="group" aria-label="user-stuff">
        <a href="{{url('/users')}}"><button type="button" class="btn btn-default">View Users</button></a>
        <a  href="{{url('users/adduser')}}"><button type="button" class="btn btn-default">Add User</button></a>
        <a href="{{url('users/removeuser')}}"><button type="button" class="btn btn-default">Remove Users (Make Inactive)</button></a>
        <a href="{{url('users/edituser')}}"><button type="button" class="btn btn-default">Edit User</button></a>
    </div>
</div>
@endsection
@section('content')
<div class='container'>
<div class='col-lg-10 col-lg-offset-1'>

<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h3>Name</h3>
		</div>
		<div class='col-md-3'>
			<h3>Username</h3>
		</div>
		<div class='col-md-3'>
			<h3>Phone Number</h3>
		</div>
		<div class='col-md-3'>
			<h3>Authorized</h3>
		</div>
	</div>
</div>
@foreach($users as $user)
@if($user->active and $user->first_name!='Admin')
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h5>{{$user->first_name}} {{$user->last_name}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$user->user}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$user->phone_num}}</h5>
		</div>

		<div class='col-md-3'>
			@if($user->is_authorized)
			<span class="glyphicon glyphicon-ok" aria-hidden="true" style='line-height:2.42857143'></span>
			@else
			<span class="glyphicon glyphicon-remove" aria-hidden="true" style='line-height:2.42857143'></span>
			@endif
		</div>
	</div>
</div>
@endif
@endforeach

</div>
</div>
@endsection