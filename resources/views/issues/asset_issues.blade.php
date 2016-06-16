@extends('layouts.app')
@include('assets.single_asset')
@section('content')
<div class='container'>
<div class='col-lg-10 col-md-9 col-sm-8 col-xs-7 col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-3'>
<div class='table-responsive' style='overflow-x:hidden;'>
	<h2> {{$asset->type->name}} ({{$asset->barcode}}) in <a href='/assets/{{$asset->container->id}}'>{{$asset->container->barcode}}</a></h2>
	<table class='table table-hover table-striped table-responsive'>
		<thead>
			<tr>
				<th style='text-align:center'>Issue ID</th>
				<th style='text-align:center'>Item</th>
				<th style='text-align:center'>Submitted By</th>
				<th style='text-align:center'>Priority</th>
				<th style='text-align:center'>Status</th>
				<th style='text-align:center'>Created On</th>
			</tr>
		</thead>
		@foreach($issues as $need)
		<tbody>
			<tr id="{{$need->id}}" class="
				@if($need->status == 'Needs Work')
					danger
				@elseif($need->status = 'In Progress')
					warning
				@else
					success
				@endif
				"
				>
				<td style='vertical-align:middle;'>
					<h5>{{$need->id}}</h5>
				</td>
				<td style='vertical-align:middle;'>
					<h5>{{$need->asset->type->name}}</h5>
				</td>
				<td style='vertical-align:middle;'>
					<h5>{{$need->user->first_name}} {{$need->user->last_name}}</h5>
				</td>
				<td style='vertical-align:middle; text-align:center'>
					<h5>{{$need->priority}}</h5>
				</td>
				<td style='vertical-align:middle;'>
					<h5>{{$need->status}}</h5>
				</td>
				<td style='vertical-align:middle;'>
					<h5>{{date('D M j g:i:s',strtotime($need->created_at))}}</h5>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
</div>

</div>
@endsection