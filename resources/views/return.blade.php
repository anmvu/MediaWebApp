@extends('layouts.app')

@section('content')
<div class='container'>
<div class='col-lg-10 col-md-9 col-sm-8 col-xs-7 col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-3'>
@if(count($items) > 1)
<h2> {{count($items)}} thing is still out</h2>
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h3>Item Name</h3>
		</div>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h3>Time Due</h3>
		</div>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h3>Loaned To</h3>
		</div>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h3>Room</h3>
		</div>
	</div>
</div>
@foreach($items as $item)
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h5>{{$item->asset_id}}</h5>
		</div>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h5>{{$item->due}}</h5>
		</div>
		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h5>{{$item->loaned_to}} ({{$item->email}})</h5>
		</div>

		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
			<h5>{{$item->container_id}}</h5>
		</div>
	</div>
</div>
@endforeach
@else
<style>
	.title {
        font-size: 72px;
        margin-bottom: 40px;
    }
</style>
<div class="title">Looks like everything's back</div>
@endif
</div>
</div>
@endsection