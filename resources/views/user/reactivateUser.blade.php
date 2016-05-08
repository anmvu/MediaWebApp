@extends('layouts.app')
@include('user.userBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
	.title {
        font-size: 72px;
        margin-bottom: 40px;
    }
</style>
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

	    	console.log(this_id);

			$.ajax({
			    url:'reactivate',
			    type: 'post',
			    data: {'id': this_id},
			    success:function(data){
			    	$("#"+this_id).remove();
			    	@if(count($users)-1 == 0)
			    		$("table").remove();
			    		$(".table-responsive").append("<div class='title'>Looks like no one's deactivated </div>");
			    	@endif
			 	}
			});
		}
		else{return false;}

    });

});
</script>
<div class='container'>
	<div class='table-responsive'>
	@if(count($users) > 0)
		<table class='table table-hover table-bordered'>
			<thead>
				<tr>
					<th style='text-align:center'>Name</th>
					<th style='text-align:center'>Username</th>
					<th style='text-align:center'>Phone Number</th>
					<th style='text-align:center'>Authorized</th>
					<th style='text-align:center'></th>
				</tr>
			</thead>
			@foreach($users as $user)
			@if($user->first_name!='Admin')
			<tbody>
				<tr id="{{$user->id}}">
					<td>{{$user->first_name}} {{$user->last_name}}</td>
					<td>{{$user->user}}</td>
					<td>{{$user->phone_num}}</td>
					<td>
						@if($user->is_authorized)
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						@else
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						@endif
					</td>
					<td>
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<div class="col-lg-12">
			            	<input type='hidden' class='id' name='id' value='{{$user->id}}'></input>
			                <button type="submit" class="btn btn-primary btn-block">
			                    Reactivate
			                </button>
			            </div>
			            	</div>
		            	</form>
		            </div>
		        </div>
				</tr>
			</tbody>
			@endif
			@endforeach
		</table>
	@else
	<div class="title">Looks like no one's deactivated </div>
	@endif
	</div>
</div>
@endsection