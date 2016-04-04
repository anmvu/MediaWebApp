@section('bar')
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
<div class='btn-toolbar' role='toolbar' aria-label='asset-stuff'>
    <div class="btn-group" role="group" aria-label="asset-stuff">
        <a href="{{url('/assets')}}"><button type="button" class="btn btn-default">View Assets</button></a>
        <a  href="{{url('assets/add')}}"><button type="button" class="btn btn-default">Add Asset</button></a>
        <a href="{{url('assets/remove')}}"><button type="button" class="btn btn-default">Remove Assets</button></a>
        <a href="{{url('assets/edit')}}"><button type="button" class="btn btn-default">Edit Asset</button></a>
    </div>
</div>
</div>
@endsection