@extends('layouts.app')

@section('content')

	<div class='container'>
		<a role="button" class="btn btn-default col-lg-4 col-md-offset-1" href='room-check'> Room Check</a>
		<div  class="col-lg-1"></div>
		<a role="button" class="btn btn-default col-lg-4"  href='loan'>Loan Equipment</a>
	</div>
	<div class='container'></div>
	<div class='container'>
		<a role="button" class="btn btn-default col-lg-4 col-md-offset-1"  href='issues'>View Issues</a>
		<div  class="col-md-1"></div>
		<a role="button" class="btn btn-default col-lg-4"  href='return'>What's not back yet?</a>
	</div>
	<div class='container'></div>
	@if(Auth::user()->is_authorized)
	<div class='container'>
		<a role="button" class="btn btn-default col-lg-4 col-md-offset-1"  href='types'>Modify Types</a>
		<div  class="col-md-1"></div>
		<a role="button" class="btn btn-default col-lg-4"  href='assets'>Modify Assets</a>
	</div>
	<div class='container'>
		<a role="button" class="btn btn-default col-lg-4 col-md-offset-1"  href='attributes'>Modify Attributes</a>
		<div  class="col-md-1"></div>
		<a role="button" class="btn btn-default col-lg-4"  href='users'>Modify Users</a>
	</div>
	@endif

    
@endsection