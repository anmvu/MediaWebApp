@extends('layouts.app')
@include('types.typeBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type='text/javascript'>
$(function () {

    $('form').on('submit', function (e) {

      	e.preventDefault();
      	if (confirm("Are you sure you want to delete?")) {
	        // your deletion code
	    
	      	var this_id = this.id.value;
	    	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

			$.ajax({
			    url:'/types',
			    type: 'post',
			    data: {'id': this_id},
			    success:function(data){
			    	$("#"+this_id).remove();
			 	}
			});
		}
		else{return false;}

    });

});
</script>
<div class='container'>
	<div class='table-responsive'>
		<table class='table table-hover table-striped table-responsive'>
			<thead>
				<tr>
					<th style='text-align:center'>Type</th>
					<th style='text-align:center'>Delete</th>
				</tr>
			</thead>
			<tbody >
				@foreach($types as $type)
				<tr id="{{$type->id}}">
					<td  style='vertical-align:middle;'> {{$type->name}}</td>
					<td>
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<div class="col-lg-5 col-lg-offset-4" style='text-align:center'>
					            	<input type='hidden' class='id' name='id' value='{{$type->id}}'></input>
					                <button type="submit" class="btn btn-danger btn-block">
					                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					                </button>
					            </div>
			            	</div>
		            	</form>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection