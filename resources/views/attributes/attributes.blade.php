@extends('layouts.app')

@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='attribute-stuff'>
    <div class="btn-group" role="group" aria-label="attribute-stuff">
        <a href="{{url('/attributes')}}"><button type="button" class="btn btn-default">View Attributes</button></a>
        <a  href="{{url('attributes/add')}}"><button type="button" class="btn btn-default">Add Attribute</button></a>
        <a href="{{url('attributes/remove')}}"><button type="button" class="btn btn-default">Remove Attributes</button></a>
        <a href="{{url('attributes/edit')}}"><button type="button" class="btn btn-default">Edit Attribute</button></a>
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
			<h3>attributename</h3>
		</div>
		<div class='col-md-3'>
			<h3>Phone Number</h3>
		</div>
		<div class='col-md-3'>
			<h3>Authorized</h3>
		</div>
	</div>
</div>
@foreach($attributes as $attribute)
@if($attribute->active and $attribute->first_name!='Admin')
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h5>{{$attribute->first_name}} {{$attribute->last_name}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$attribute->attribute}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$attribute->phone_num}}</h5>
		</div>

		<div class='col-md-3'>
			@if($attribute->is_authorized)
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