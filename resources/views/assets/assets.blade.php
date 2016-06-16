@extends('layouts.app')
@include('assets.assetBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.pUpdate').editable({
        validate: function(value) {
            if($.trim(value) == '')
                return 'Value is required.';
        },
        placement: 'top',
        send:'always',
        ajaxOptions: {
            dataType: 'json',
            type: 'post'
        },
        success: function(response) {
        if(response.status == 'error') return response.msg; //msg will be shown in editable form
	    }
    });


    $(".container_id").editable({
    	validate: function(value) {
            if($.trim(value) == '')
                return 'Value is required.';
        },
        placement: 'top',
        send:'always',
        ajaxOptions: {
            dataType: 'json',
            type: 'post'
        },
        source: [
        	{value: 0, text: "None"},
        @foreach($assets as $asset)
        @if($asset->is_container)
        	{value: {{$asset->id}}, text:"{{$asset->barcode}}"},
        	@endif
        	@endforeach
        ],
        success: function(response) {
        	console.log(response);
        if(response.status == 'error') return response.msg; //msg will be shown in editable form
	    }
    });
});

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
			    	// $("#"+this_id).remove();
			 	}
			});
		}
		else{return false;}

    });

});
</script>

<div class='container'>
	<div class='table-responsive'  style='overflow-x:hidden;'>
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
			@if(strstr($asset->type->name,'Room') == false)
			
			<tbody>
				<tr id="{{$asset->id}}">
					<td style='vertical-align:middle;'><a href="assets/{{$asset->id}}">{{$asset->barcode}}</a></td>
					<td style='vertical-align:middle;'>{{$asset->type->name}}</td>
					<td style='vertical-align:middle;'>
						@if($asset->time_checked != null)
							{{date('D M j g:i:s',strtotime($asset->time_checked))}}
						@else
							<i style='color:red;'>Never</i>
						@endif
					</td>
					<td style='vertical-align:middle;'>
						<a href="#" name='container_id' id="container_id" data-type="select" data-pk="1" data-title="Enter Attribute Label" class="editable editable-click container_id" data-emptytext="None" data-url="assets/edit/{{$asset->id}}" style="display: inline;">
							@if($asset->container_id != null)
							{{$asset->container->barcode}}
							@else
							{{$asset->container_id}}
							@endif

						</a>
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
								<div class="col-lg-9" style='text-align:center'>
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
			@endif
			@endforeach
		</table>
	</div>
</div>
@endsection