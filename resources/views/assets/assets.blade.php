@extends('layouts.app')
@include('user.userBar')
@section('content')
<div class='container'>
<div class='col-lg-10 col-md-9 col-sm-8 col-xs-7 col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-3'>
<div class='table-responsive'>
<table class='table table-hover table-bordered'>
	<thead>
		<tr>
			<th style='text-align:center'>Barcode</th>
			<th style='text-align:center'>Type</th>
			<th style='text-align:center'>Last Checked</th>
			<th style='text-align:center'>Container</th>
			<th style='text-align:center'>Is it a Room?</th>
		</tr>
	</thead>
	@foreach($assets as $asset)
	<tbody>
		<tr>
			<td>{{$asset->barcode}}</td>
			<td>{{$asset->type_id}}</td>
			<td>{{$asset->time_checked}}</td>
			<td>{{$asset->container_id}}</td>
			<td>
				@if($asset->is_container)
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				@else
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				@endif
			</td>
		</tr>
	</tbody>
	@endforeach
</table>
</div>
</div>
</div>
@endsection