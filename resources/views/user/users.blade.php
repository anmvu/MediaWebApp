@extends('layouts.app')
@include('user.userBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
	.admin-bar {
		float:right;
	}
	.table-responsive {
		overflow-x: hidden;
	}
</style>
<script src="/js/add_user.js"></script>
<script type='text/javascript'>

$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#user').editable({
	    success: function(response, newValue) {
	    	console.log(response);
	        if(response.status == 'error') return response.msg; //msg will be shown in editable form
	    }
    });

    $('.pUpdate').editable({
        validate: function(value) {
            if($.trim(value) == '')
                return 'Value is required.';
        },
        type: 'text',
        title: 'Edit Comment',
        placement: 'top',
        send:'always',
        ajaxOptions: {
            dataType: 'json',
            type: 'post'
        }
    });
});



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
			    url:'/users',
			    type: 'post',
			    data: {'id': this_id},
			    success:function(data){
			    	console.log(data);
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
	<div class='table-responsive'>
		<div class="admin-bar">
			<button type="button" class="btn btn-success" onclick="addUser();">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				Add
			</button>
		</div>
		<table class='table table-hover table-striped table-responsive'>
			<thead>
				<tr>
					<th style='text-align:center'>Name</th>
					<th style='text-align:center'>Username</th>
					<th style='text-align:center'>Phone Number</th>
					<th style='text-align:center'>Authorized</th>
					<th style='text-align:center'>Deactivate</th>
				</tr>
			</thead>
			@foreach($users as $user)
			@if($user->active and $user->first_name!='Admin')
			<tbody>
				<tr id="{{$user->id}}">
					<td style='vertical-align:middle;'>
						<a href="#" name='phone_num' id="first_name" data-type="text" data-pk="1" data-title="Enter First Name" class="editable editable-click pUpdate" data-url="users/edit/{{$user->id}}" style="display: inline;">{{$user->first_name}}</a> 
						<a href="#" name='last_name' id="last_name" data-type="text" data-pk="1" data-title="Enter Last Name" class="editable editable-click pUpdate" data-url="users/edit/{{$user->id}}" style="display: inline;">{{$user->last_name}}</a>
					</td>
					<td style='vertical-align:middle;'>
						<!-- <a href="#" name='user' id="user" data-type="text" data-pk="1" data-title="Enter barcode/N Number" class="editable editable-click pUpdate" data-url="users/edit/{{$user->id}}" style="display: inline;"> -->
							{{$user->user}}
						<!-- </a> -->
					</td>
					<td style='vertical-align:middle;'>
						<a href="#" name='phone_num' id="phone_num" data-type="text" data-pk="1" data-title="Enter phone number" class="editable editable-click pUpdate" data-url="users/edit/{{$user->id}}" style="display: inline;">{{$user->phone_num}}</a>
					</td>
					<td style='vertical-align:middle;'>
						@if($user->is_authorized)
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						@else
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						@endif
					</td>
					<td style='vertical-align:middle;'>
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<div class="col-lg-6 col-lg-offset-3" style='text-align:center'>
			            	<input type='hidden' class='id' name='id' value='{{$user->id}}'></input>
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