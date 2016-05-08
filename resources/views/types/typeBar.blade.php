@section('bar')
<!-- <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"> -->
<div class='btn-toolbar' role='toolbar' aria-label='Type-stuff'>
    <div class="btn-group-justified" role="group" aria-label="Type-stuff">
        <a href="{{url('/types')}}" class="btn btn-default">View Types</a>
        <a  href="{{url('types/add')}}" class="btn btn-default">Add Type</a>
        <a href="{{url('types/edit')}}" class="btn btn-default">Edit Type</a>
    </div>
</div>
<!-- </div> -->
@endsection