@extends('layouts.app')
@section('content')



<div class='container'>
	<div class='table-responsive'  style='overflow-x:hidden;'>
		<table class='table table-hover table-striped table-responsive'>
			<thead>
				<tr>
					<th style='text-align:center'>Room</th>
				</tr>
			</thead>
			@foreach($rooms as $room)
			<tbody>
				<tr id="{{$room->id}}" 
				@if(count($items[$room->id]) != 0))
					
				@foreach(($items[$room->id]) as $item)
					@if($item->issues->first()['status'] == "Done")
					class="success"
					@else
					class="danger"
					@endif
				@endforeach
				@else
				"merr"
				class="success"
				
				@endif
				>
					<td style='vertical-align:middle;'>{{$room->barcode}}</td>	
				</tr>
			</tbody>
			@endforeach
		</table>
	</div>
</div>

@endsection