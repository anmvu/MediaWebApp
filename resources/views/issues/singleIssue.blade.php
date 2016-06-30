@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type='text/javascript'>
$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.status').editable({
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
            {value: "Needs Work", text:"Needs Work"},
            {value: "In Progress", text:"In Progress"},
            {value: "Solved", text:"Solved"},
        ],
        success: function(response) {
        	console.log(window.location.pathname);
        	if(response.status == 'error') return response.msg; //msg will be shown in editable form
        	if(response.status == 'Needs Work' || response.status == 'In Progress'){
		    	$('<tr><td colspan="2"><textarea id="new_comment" type="text" class="form-control" name="comment"></textarea><input type="hidden" name="problem" value="true"></td><td><button class="btn btn-success issue-submit" name="commit" type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><span class="glyphicon glyphicon-remove" aria-hidden="true"></td></tr>').insertBefore('table > tbody > tr:first');
		    }
		    else{
		    	$('<tr><td colspan="2"><textarea type="text" class="form-control" name="comment"></textarea><input type="hidden" name="problem" value="false"></td><td><button class="btn btn-success issue-submit" name="commit" type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><span class="glyphicon glyphicon-remove" aria-hidden="true"></td></tr>').insertBefore('table > tbody > tr:first');
		    }
		    $(".issue-submit").bind("click", function() {
				selected_button = $(this);
				$
				var comment = $("textarea[name='comment']").val();
				var problem = $("input[name='problem']").val();
				$.ajax({
					    url:window.location.pathname,
					    type: 'post',
					    data: {'comment': comment, 'problem':problem},
					    success:function(data){
					    	selected_button.parent().parent().remove();

					    	if(problem){
					    		$('<tr id="'+data.id+'" class="danger"><td style="vertical-align:middle;">'+comment+'</td><td>'+data.created_on+'</td></tr>').insertBefore('table > tbody > tr:first');
					    	}
					    	else{
					    		$('<tr id="'+data.id+'" class="danger"><td style="vertical-align:middle;">'+comment+'</td><td>'+data.created_on+'</td></tr>').insertBefore('table > tbody > tr:first');
					    	}
					    	
					 	}
					});	
			});
        }
    });
	

});
</script>
<h2> {{$issue->asset->type->name}} in {{$issue->asset->container->barcode}} on {{date('D M j g:i A',strtotime($issue->created_at))}}</h2>
<h3> Currently <a href="#" name='status' id="status" data-type="select" data-pk="1" data-title="Choose Container" class="editable editable-click status" data-emptytext="None" data-url="/issues/edit/{{$issue->id}}" style="display: inline;">{{$issue->status}}</a> at {{$issue->priority}} Priority</h3>
<h5> Contact {{$issue->user->first_name}} {{$issue->user->last_name}} for questions in regards to this issue</h5>
<table class='table table-hover table-striped table-responsive'>
	<thead>
		<td>Comment</td>
		<td>Created On</td>
		<td>Created By</td>
	</thead>
	<tbody>
		@foreach($comments as $comment)

		<tr class="
		@if ($comment->is_problem)
			danger
		@else
		success
		@endif
		"
		id="{{$comment->id}}">
			<td>{{$comment->comment}}</td>
			<td>{{date('D M j g:i A',strtotime($comment->created_at))}}</td>
			<td></td>
		</tr>
		@endforeach
	</tbody>
</table>


@endsection