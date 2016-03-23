@extends('layouts.app')

@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='asset-stuff'>
    <div class="btn-group" role="group" aria-label="asset-stuff">
        <a href="{{url('/assets')}}"><button type="button" class="btn btn-default">View Assets</button></a>
        <a  href="{{url('assets/add')}}"><button type="button" class="btn btn-default">Add Asset</button></a>
        <a href="{{url('assets/remove')}}"><button type="button" class="btn btn-default">Remove Assets (Make Inactive)</button></a>
        <a href="{{url('assets/edit')}}"><button type="button" class="btn btn-default">Edit Assets</button></a>
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
			<h3>assetname</h3>
		</div>
		<div class='col-md-3'>
			<h3>Phone Number</h3>
		</div>
		<div class='col-md-3'>
			<h3>Authorized</h3>
		</div>
	</div>
</div>
@foreach($assets as $asset)
@if($asset->active and $asset->first_name!='Admin')
<div class='container-fluid'>
	<div class='form-group'>
		<div class='col-md-3'>
			<h5>{{$asset->first_name}} {{$asset->last_name}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$asset->asset}}</h5>
		</div>
		<div class='col-md-3'>
			<h5>{{$asset->phone_num}}</h5>
		</div>

		<div class='col-md-3'>
			@if($asset->is_authorized)
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