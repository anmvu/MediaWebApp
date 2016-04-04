@extends('layouts.app')
@include('assets.assetBar')
@section('content')
<div class='container'>
<div class='col-lg-10 col-md-9 col-sm-8 col-xs-7 col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-3'>
<div class='table-responsive'>
<table class='table table-hover table-bordered'>
	<thead>
		<tr>
			<th style='text-align:center'>Label</th>
		</tr>
	</thead>
	@foreach($attributes as $attribute)
	<tbody>
		<tr>
			<td>{{$attribute->label}}</td>
		</tr>
	</tbody>
	@endforeach
</table>
</div>
</div>
</div>
@endsection