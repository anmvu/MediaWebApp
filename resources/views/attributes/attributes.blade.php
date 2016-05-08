@extends('layouts.app')
@include('attributes.attributeBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
$(function () {

    $('form').on('submit', function (e) {

      	e.preventDefault();
      	if (confirm("Are you sure you want to delete?")) {
	        // your deletion code
	    
	      	var this_id = this.id.value;
	      	// console.log(this);
	    	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
	    	console.log(this_id)
			$.ajax({
			    url:'/attributes',
			    type: 'post',
			    data: {'id': this_id},
			    success:function(data){
			    	$("#"+this_id).remove();
			    	console.log(data);
			    	console.log(this_id);
			    	// $("#"+this_id).remove();
			 	}
			});
		}
		else{return false;}

    });

});
</script>
<div class='container'>
	<div class='table-responsive'>
		<table class='table table-hover table-bordered'>
			<thead>
				<tr>
					<th style='text-align:center'>Label</th>
					<th style='text-align:center'>Delete</th> 
				</tr>
			</thead>
			@foreach($attributes as $attribute)
			<tbody>
				<tr id='{{$attribute->id}}'>
					<td style='vertical-align:middle;'>{{$attribute->label}}</td>
					<td>
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<div class="col-lg-5 col-lg-offset-4" style='text-align:center'>
					            	<input type='hidden' class='id' name='id' value='{{$attribute->id}}'></input>
					                <button type="submit" class="btn btn-danger btn-block">
					                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					                </button>
					            </div>
			            	</div>
		            	</form>
						
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
	</div>
</div>
@endsection