@extends('layouts.app')

@section('content')

	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-md-4 col-md-offset-1" href='room-check'> Room Check</a>
		<div  class="col-md-2"></div>
		<a role="button" class="btn btn-default col-md-4"  href='loan'>Loan Equipment</a>
	</div>
	<div class='container-fluid form-group'></div>
	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-md-4 col-md-offset-1"  href='issues'>View Issues</a>
		<div  class="col-md-2"></div>
		<a role="button" class="btn btn-default col-md-4"  href='return'>What's not back yet?</a>
	</div>
	<div class='container-fluid form-group'></div>
	@if(Auth::user()->is_authorized)
	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-md-4 col-md-offset-1"  href='types'>Modify Types</a>
		<div  class="col-md-2"></div>
		<a role="button" class="btn btn-default col-md-4"  href='assets'>Modify Assets</a>
	</div>
	<div class='container-fluid form-group'></div>
	<div class='container-fluid form-group'>
		<a role="button" class="btn btn-default col-md-4 col-md-offset-1"  href='attributes'>Modify Attributes</a>
		<div  class="col-md-2"></div>
		<a role="button" class="btn btn-default col-md-4"  href='users'>Modify Users</a>
	</div>
	@endif

    
@endsection