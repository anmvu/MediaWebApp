
@section('bar')
<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1">
<div class='btn-toolbar' role='toolbar' aria-label='user-stuff'>
    <div class="btn-group" role="group" aria-label="user-stuff">
        <a href="{{url('/users')}}"><button type="button" class="btn btn-default">View Users</button></a>
        <a  href="{{url('users/add')}}"><button type="button" class="btn btn-default">Add User</button></a>
        <a href="{{url('users/remove')}}"><button type="button" class="btn btn-default">Remove Users (Make Inactive)</button></a>
        <a href="{{url('users/edit')}}"><button type="button" class="btn btn-default">Edit Active Users</button></a>
        <a href="{{url('users/reactivate')}}"><button type="button" class="btn btn-default">Reactivate Users</button></a>
    </div>
</div>
</div>
@endsection