@section('bar')
<div class='btn-toolbar' role='toolbar' aria-label='asset-stuff'>
    <div class="btn-group-justified" role="group" aria-label="asset-stuff">
        <a href="/assets/{{$id}}" class="btn btn-default">View Attributes</a>
        <a  href= "/assets/{{$id}}/issues" class="btn btn-default">View Issues</a>
    </div>
</div>
@endsection