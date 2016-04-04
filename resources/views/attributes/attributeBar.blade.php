@section('bar')
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
	<div class='btn-toolbar' role='toolbar' aria-label='attribute-stuff'>
	    <div class="btn-group" role="group" aria-label="attribute-stuff">
	        <a href="{{url('/attributes')}}"><button type="button" class="btn btn-default">View Attributes</button></a>
	        <a  href="{{url('attributes/add')}}"><button type="button" class="btn btn-default">Add Attribute</button></a>
	        <a href="{{url('attributes/remove')}}"><button type="button" class="btn btn-default">Remove Attributes</button></a>
	        <a href="{{url('attributes/edit')}}"><button type="button" class="btn btn-default">Edit Attribute</button></a>
	    </div>
	</div>
</div>
@endsection