@section('bar')
<!-- <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"> -->
<div class='btn-toolbar' role='toolbar' aria-label='asset-stuff'>
    <div class="btn-group-justified" role="group" aria-label="asset-stuff">
        <a href="{{url('/assets')}}" class="btn btn-default">View Assets</a>
        <a  href="{{url('assets/add')}}" class="btn btn-default">Add Asset</a>
        <a href="{{url('assets/edit')}}" class="btn btn-default">Edit Asset</a>
    </div>
</div>
<!-- </div> -->
@endsection