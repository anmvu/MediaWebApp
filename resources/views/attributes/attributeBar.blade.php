@section('bar')
<!-- <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"> -->
	<div class='btn-toolbar-justified' role='toolbar' aria-label='attribute-stuff'>
	    <div class="btn-group" role="group" aria-label="attribute-stuff">
	        <a href="{{url('/attributes')}}" class="btn btn-default">View Attributes</a>
	        <a  href="{{url('attributes/add')}}" class="btn btn-default">Add Attribute</a>
	        <a href="{{url('attributes/remove')}}" class="btn btn-default">Remove Attributes</a>
	        <a href="{{url('attributes/edit')}}" class="btn btn-default">Edit Attribute</a>
	    </div>
	</div>
<!-- </div> -->
@endsection