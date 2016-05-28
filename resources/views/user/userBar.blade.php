@section('bar')
<!-- <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"> -->
<div class='btn-toolbar' role='toolbar' aria-label='user-stuff'>
    <div class="btn-group-justified" role="group" aria-label="user-stuff">
        <a href="{{url('/users')}}" class="btn btn-default">View Users</a> 
    	<!-- <a href="{{url('/users/add')}}" class="btn btn-default">Add User</a> -->
    	<a href="{{url('/users/reactivate')}}" class="btn btn-default">Reactivate User</a>
    </div>
</div>
<!-- </div> -->
@endsection