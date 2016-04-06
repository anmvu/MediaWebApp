
@section('bar')
<!-- <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1"> -->
<!-- <div class='btn-toolbar' role='toolbar' aria-label='user-stuff'> -->
    <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group with nested dropdown">
    	@if(strpos(Request::path(), 'roomcheck') !== false) 
    	<a href="{{url('/roomcheck')}}" class="btn btn-default active" role="button">
    	@else 
    	<a href="{{url('/roomcheck')}}" class="btn btn-default" role="button">
    	@endif
    	Room Check</a>
    	@if(strpos(Request::path(), 'loan') !== false) 
    	<a href="{{url('/loan')}}" class="btn btn-default active" role="button">
    	@else 
    	<a href="{{url('/loan')}}" class="btn btn-default" role="button">
    	@endif
    	Loan Equipment</a> 
    	@if(strpos(Request::path(), 'return') !== false) 
    	<a href="{{url('/return')}}" class="btn btn-default active" role="button">
    	@else 
    	<a href="{{url('/return')}}" class="btn btn-default" role="button">
    	@endif
    	What's still out?</a>
    	@if(strpos(Request::path(), 'issues') !== false) 
    	<a href="{{url('/issues')}}" class="btn btn-default active" role="button">
    	@else 
    	<a href="{{url('/issues')}}" class="btn btn-default" role="button">
    	@endif
    	View Issues</a>  
    	<div class="btn-group" role="group"> 
    		@if(strpos(Request::path(), 'types') !== false)
    		<a href="#" class="btn btn-default dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@else
    		<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@endif
    		Types
    			<span class="caret"></span> 
    		</a> 
    		<ul class="dropdown-menu"> 
    			<li><a href="{{url('/types')}}">View Types</a></li> 
    			<li><a href="{{url('/types/add')}}">Add Type</a></li> 
    		</ul> 
    	</div>
    	<div class="btn-group" role="group"> 
    		@if(strpos(Request::path(), 'assets') !== false)
    		<a href="#" class="btn btn-default dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@else
    		<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@endif
    		Assets
    			<span class="caret"></span> 
    		</a> 
    		<ul class="dropdown-menu"> 
    			<li><a href="{{url('/assets')}}">View Assets</a></li> 
    			<li><a href="{{url('/assets/add')}}">Add Assets</a></li> 
    			<li><a href="{{url('/assets/link')}}">Link Attribute to an Asset</a></li> 
    		</ul> 
    	</div>
    	<div class="btn-group" role="group"> 
    		@if(strpos(Request::path(), 'attributes') !== false)

    		<a href="#" class="btn btn-default dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@else
    		<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@endif
    		Attributes
    			<span class="caret"></span> 
    		</a> 
    		<ul class="dropdown-menu"> 
    			<li><a href="{{url('/attributes')}}">View Attributes</a></li> 
    			<li><a href="{{url('/attributes/add')}}">Add Attribute</a></li> 
    		</ul> 
    	</div>
    	<div class="btn-group" role="group"> 
    		@if(strpos(Request::path(), 'users') !== false)
    		<a href="#" class="btn btn-default dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@else
    		<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    		@endif
    		Users 
    			<span class="caret"></span> 
    		</a> 
    		<ul class="dropdown-menu"> 
    			<li><a href="{{url('/users')}}">View Users</a></li> 
    			<li><a href="{{url('/users/add')}}">Add User</a></li> 
    			<li><a href="{{url('/users/reactivate')}}">Reactivate User</a></li> 
    		</ul> 
    	</div>
        <!-- <a href="{{url('/users')}}"class="btn btn-default">View Users</a>
        <a  href="{{url('users/add')}}"class="btn btn-default">Add User</a>
        <a href="{{url('users/remove')}}"class="btn btn-default">Remove Users (Make Inactive)</a>
        <a href="{{url('users/edit')}}"class="btn btn-default">Edit Active Users</a>
        <a href="{{url('users/reactivate')}}"class="btn btn-default">Reactivate Users</a> -->
    </div>
<!-- </div> -->
<!-- </div> -->
@endsection