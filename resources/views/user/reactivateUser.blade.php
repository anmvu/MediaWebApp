@extends('layouts.app')
<!-- @include('user.userBar') -->
@section('content')
<div class='container'>
<div class='col-lg-10 col-md-9 col-sm-10 col-xs-10  col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
<div class='table-responsive'>
@if(count($users) > 0)
<table class='table table-hover table-bordered'>
	<thead>
		<tr>
			<th style='text-align:center'>Name</th>
			<th style='text-align:center'>Username</th>
			<th style='text-align:center'>Phone Number</th>
			<th style='text-align:center'>Authorized</th>
			<th style='text-align:center'> </th>
		</tr>
	</thead>
	@foreach($users as $user)
	@if($user->first_name!='Admin')
	<tbody>
		<tr>
			<td>{{$user->first_name}} {{$user->last_name}}</td>
			<td>{{$user->user}}</td>
			<td>{{$user->phone_num}}</td>
			<td>
				@if($user->is_authorized)
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				@else
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				@endif
			</td>
			<td>
				<form class="form-horizontal" role="form" method="POST" action="{{ url('users/reactivate') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="col-lg-12">
	            	<input type='hidden' name='id' value='{{$user->id}}'></input>
	                <button type="submit" class="btn btn-primary btn-block">
	                    <i class="fa fa-btn fa-sign-in"></i>Reactivate
	                </button>
	            </div>
	            	</div>
            	</form>
            </div>
        </div>
		</tr>
	</tbody>
	@endif
	@endforeach
</table>
@else
<style>
	.title {
        font-size: 72px;
        margin-bottom: 40px;
    }
</style>
<div class="title">Looks like no one's deactivated </div>
@endif
</div>
</div>
</div>
@endsection