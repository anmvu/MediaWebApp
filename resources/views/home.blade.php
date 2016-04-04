@extends('layouts.app')

@section('content')

	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" href='room-check'> Room Check</a>
		<div  class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4"  href='loan'>Loan Equipment</a>
	</div>
	<div class='container-fluid form-group'></div>
	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1"  href='issues'>View Issues</a>
		<div  class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4"  href='return'>What's not back yet?</a>
	</div>
	<div class='container-fluid form-group'></div>
	@if(Auth::user()->is_authorized)
	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1"  href='types'>Modify Types</a>
		<div  class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4"  href='assets'>Modify Assets</a>
	</div>
	<div class='container-fluid form-group'></div>
	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1"  href='attributes'>Modify Attributes</a>
		<div  class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
		<a role="button" class="btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-4"  href='users'>Modify Users</a>
	</div>
	@endif

    
@endsection