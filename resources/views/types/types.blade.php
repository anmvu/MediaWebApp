@extends('layouts.app')

@include('user.userBar')

@section('content')
<div class='container'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
<div class='table-responsive'>
<table class='table table-hover table-bordered'>
	<thead>
		<tr>
			<th style='text-align:center'>Name</th>
			<th style='text-align:center'>typename</th>
			<th style='text-align:center'>Phone Number</th>
			<th style='text-align:center'>Authorized</th>
		</tr>
	</thead>
	@foreach($types as $type)
	@if($type->active and $type->first_name!='Admin')
	<tbody>
		<tr>
			<td>{{$type->first_name}} {{$type->last_name}}</td>
			<td>{{$type->type}}</td>
			<td>{{$type->phone_num}}</td>
			<td>
				@if($type->is_authorized)
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				@else
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				@endif
			</td>
		</tr>
	</tbody>
	@endif
	@endforeach
</table>
</div>
</div>
</div>
@endsection