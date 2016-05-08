@extends('layouts.app')
@include('assets.assetBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
$(function () {

    $('form').on('submit', function (e) {

      	e.preventDefault();
      	if (confirm("Are you sure you want to delete?")) {
	        // your deletion code
	    
	      	var row = $(this).parent().parent();	      	
	      	var this_id = this.id.value;
	      	// console.log(this);
	    	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});


			$.ajax({
			    url:'/assets',
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
<style>
	table td{
		/*width:100%;*/
	}
</style>
<div class='container'>
	<div class='table-responsive'>
		<table class='table table-hover table-striped table-responsive'>
			<thead>
				<tr>
					<th style='text-align:center'>Barcode</th>
					<th style='text-align:center'>Type</th>
					<th style='text-align:center'>Last Checked</th>
					<th style='text-align:center'>Container</th>
					<th style='text-align:center'>Is it a Room?</th>
					<th style='text-align:center'>Delete</th>
				</tr>
			</thead>
			@foreach($assets as $asset)
			<tbody>
				<tr id="{{$asset->id}}">
					<td style='vertical-align:middle;'>{{$asset->barcode}}</td>
					<td style='vertical-align:middle;'>{{$asset->type_id}}</td>
					<td style='vertical-align:middle;'>{{$asset->time_checked}}</td>
					<td style='vertical-align:middle;'>
						@if ($asset->container_id == null)
							No Container
						@else	
						{{$asset->container_id}}
						@endif
					</td>
					<td style='vertical-align:middle;'>
						@if($asset->is_container)
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						@else
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						@endif
					</td>
					<td>
						<form class="form-horizontal" class='delete' role="form" method="POST" >
							<div class="form-group">
								<div class="col-lg-8 col-lg-offset-2" style='text-align:center'>
			            			<input type='hidden' class='id' name='id' value='{{$asset->id}}'></input>
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