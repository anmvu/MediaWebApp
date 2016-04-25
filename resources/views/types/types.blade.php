@extends('layouts.app')

@include('user.userBar')

@section('content')
<div class='container'>
<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
<div class='table-responsive'>
<table class='table table-hover table-bordered types'>
	<thead>
		<tr>
			<th colspan="2" style='text-align:center'>Type</th>
		</tr>
	</thead>
	<tbody >
		@foreach($types as $type)
		<tr>
			<td> {{$type->name}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
@endsection