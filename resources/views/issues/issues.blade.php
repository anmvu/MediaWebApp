@extends('layouts.app')

@section('content')
<div class='container'>
<div class='col-lg-10 col-lg-offset-1'>
@if(count($needsWork) > 1 or count($workingOn) > 1)
<h2> {{count($needsWork)-1}} thing Needs Work</h2>
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h3>work ID</h3>
		</div>
		<div class='col-md-3'>
			<h3>Item</h3>
		</div>
		<div class='col-md-3'>
			<h3>Loaned To</h3>
		</div>
		<div class='col-md-3'>
			<h3>Room</h3>
		</div>
	</div>
</div>
@foreach($need as $needsWork)
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h5>{{$need->id}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$need->asset_id}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$need->priority}}</h5>
		</div>

		<div class='col-md-3'>
			<h5>{{$need->status}}</h5>
		</div>
	</div>
</div>
@endforeach
<h2> {{count($needsWork)-1}} thing is being worked on</h2>
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h3>work ID</h3>
		</div>
		<div class='col-md-3'>
			<h3>Item</h3>
		</div>
		<div class='col-md-3'>
			<h3>Loaned To</h3>
		</div>
		<div class='col-md-3'>
			<h3>Room</h3>
		</div>
	</div>
</div>
@foreach($work as $workingOn)
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h5>{{$work->id}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$work->asset_id}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$work->priority}}</h5>
		</div>

		<div class='col-md-3'>
			<h5>{{$work->status}}</h5>
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
<div class="title">Looks like everything's in order</div>
@endif
</div>
</div>
@endsection