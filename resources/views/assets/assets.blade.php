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
        ]
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
			<tbody>
				<tr id="{{$asset->id}}">
					<td style='vertical-align:middle;'><a href="assets/{{$asset->id}}">{{$asset->barcode}}</a></td>
					<td style='vertical-align:middle;'><a href="#" name='type_id' id="type_id" data-type="text" data-pk="1" data-title="Enter Attribute Label" class="editable editable-click pUpdate" data-url="assets/edit/{{$asset->id}}" style="display: inline;">{{$asset->type->name}}</a></td>
					<td style='vertical-align:middle;'><a href="#" name='asset_id' id="asset_id" data-type="text" data-pk="1" data-title="Enter Attribute Label" class="editable editable-click pUpdate" data-emptytext="Never" data-url="assets/edit/{{$asset->id}}" style="display: inline;">{{$asset->time_checked}}</a></td>
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
			@endforeach
		</table>
	</div>
</div>
@endsection