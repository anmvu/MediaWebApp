@extends('layouts.app')

@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='type-stuff'>
    <div class="btn-group" role="group" aria-label="type-stuff">
        <a href="{{url('/types')}}"><button type="button" class="btn btn-default">View Types</button></a>
        <a  href="{{url('types/add')}}"><button type="button" class="btn btn-default">Add Type</button></a>
        <a href="{{url('types/remove')}}"><button type="button" class="btn btn-default">Remove Types</button></a>
        <a href="{{url('types/edit')}}"><button type="button" class="btn btn-default">Edit Type</button></a>
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
			<h3>typename</h3>
		</div>
		<div class='col-md-3'>
			<h3>Phone Number</h3>
		</div>
		<div class='col-md-3'>
			<h3>Authorized</h3>
		</div>
	</div>
</div>
@foreach($types as $type)
@if($type->active and $type->first_name!='Admin')
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h5>{{$type->first_name}} {{$type->last_name}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$type->type}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$type->phone_num}}</h5>
		</div>

		<div class='col-md-3'>
			@if($type->is_authorized)
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