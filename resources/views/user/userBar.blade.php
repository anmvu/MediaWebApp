
@section('bar')
<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1">
<div class='btn-toolbar' role='toolbar' aria-label='user-stuff'>
    <div class="btn-group-justified" role="group" aria-label="user-stuff">
        <a href="{{url('/users')}}"class="btn btn-default">View Users</a>
        <a  href="{{url('users/add')}}"class="btn btn-default">Add User</a>
        <!-- <a href="{{url('users/remove')}}"class="btn btn-default">Remove Users (Make Inactive)</a> -->
        <a href="{{url('users/edit')}}"class="btn btn-default">Edit Active Users</a>
        <a href="{{url('users/reactivate')}}"class="btn btn-default">Reactivate Users</a>
    </div>
</div>
</div>
@endsection