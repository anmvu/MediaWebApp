@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
	.title {
        font-size: 72px;
        margin-bottom: 40px;
    }
</style>
<script>
$(function () {
	
    $('form').on('submit', function (e) {

      	e.preventDefault();
      	if (confirm("Are you sure it's returned?")) {
	        // your deletion code
	    
	      	var this_id = this.id.value;
	    	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

	    	// console.log(this_id);


			$.ajax({
			    url:'/return',
			    type: 'post',
			    data: {'id': this_id},
			    success:function(data){
			    	$("#"+this_id).remove();
			    	var count = parseInt($("#count").text());
			    	if(count-1 != 0)$("#count").text(count-1 + " thing(s) are still out");
			    	else{
			    		$("table").remove();
			    		$("#count").remove();
			    		$(".table-responsive").append("<div class='title'>Looks like everything's back </div>");
			    	}
			 	}
			});
		}
		else{return false;}

    });

});
</script>
<div class='container'>
	@if(count($items) > 0)
	<div class='table-responsive'>
		<h2 id='count' value='{{count($items)}}'> {{count($items)}} @if(count($items)> 1)
	 things
	 @else
	 thing
	 @endif are still out</h2>
		<table class='table table-hover table-striped table-responsive'>
			<thead>
				<tr>
					<th style='text-align:center'>Item Name</th>
					<th style='text-align:center'>Time Lent</th>
					<th style='text-align:center'>Time Due</th>
					<th style='text-align:center'>Loaned To</th>
					<th style='text-align:center'>Room</th>
					<th style='text-align:center'>Return</th>
				</tr>
			</thead>
			@foreach($items as $item)
			<tbody>
				<tr id="{{$item->id}}">
					<td style='vertical-align:middle;'>
						<h5>{{$item->asset->barcode}}</h5>
					</td>
					<td style='vertical-align:middle;'>
						<h5>{{date('D M j g:i:s',strtotime($item->created_at))}}</h5>
					</td>
					<td style='vertical-align:middle;'>
						<h5>{{date('D M j g:i:s',strtotime($item->due))}}</h5>
					</td>
					<td style='vertical-align:middle;'>
						<h5>{{$item->loaned_to}} ({{$item->email}})</h5>
					</td>
					<td style='vertical-align:middle;'>
						<h5>{{$item->container->barcode}}</h5>
					</td>
					<td style='vertical-align:middle;'>
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<div class="col-lg-9" style='text-align:center'>
					            	<input type='hidden' class='id' name='id' value='{{$item->id}}'></input>
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
	@else
	
	<div class="title">Looks like everything's back</div>
	@endif
</div>

@endsection