@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>

$(function() {
	
    $('#search').on('click', function (e) {

      	e.preventDefault();
    	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    var checked = [];

    	$('input:checkbox.item').each(function () {
		    this.checked ? checked.push($(this).val()) : "";
		});



        $.ajax({
            url: "/rooms/find",
            type: "post",
            data: {'items':checked},
            success: function(data) {
            	$("#rooms tr:not(:first)").hide();
            	if(data['rooms'].length != 0){
	            	for(i = 0; i < data['rooms'].length; i++){
	            		$('#'+data['rooms'][i]['container_id']).show();
	            	}
	            }
	            else{
	            	$("#rooms tbody:last").after('<tbody ><tr id="sorry"><td>SORRY, NO ROOMS HAS ALL THESE AMENITIES</td></tr></tbody>');
	            	$("#sorry").show();
	            }
                
            },
        });
    });

    $('#reset').on('click', function (e) {

      	e.preventDefault();

    	$('input:checkbox.item').each(function () {
		    $(this).attr('checked',false);
		});

		$("#sorry").hide();
		$("#rooms tr").show();
    });
});
</script>
<style>
	.equipment{
		text-align: left;
	}
</style>
<div class='container'>
	<!-- <div class="ui-widget">
        <label for="keyword">Room: </label>
        <input id="keyword">
    </div> -->
<!--     <div id="loading-image" style='display:hidden;'>Hi</div>
 -->    <form class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Select All Desired Amenities</label>
            <table class="col-lg-8 col-md-8 col-sm-8 col-xs-8 dropdown">
                <tr>
	                <td class='equipment'><input class="item" id='HDMI' name="HDMI" value='{{App\Type::where("name","HDMI Laptop Cable")->first(["id"])["id"]}}' type="checkbox"> HDMI</td>
	                <td class='equipment'><input class="item" id='VGA' name="VGA" value='{{App\Type::where("name","VGA Laptop Cable")->first(["id"])["id"]}}' type="checkbox"> VGA</td>
	                <td class='equipment'><input class="item" id='brite' name="brite" value='{{App\Type::where("name","Briteclass Lecture Capture System")->first(["id"])["id"]}}' type="checkbox"> BriteClass Lecture Capture</td>
                </tr>
                <tr>
	                <td class='equipment'><input class="item" id='VHS/DVD' name="VHS/DVD" value='{{App\Type::where("name","DVD/VHS")->first(["id"])["id"]}}' type="checkbox"> VHS/DVD Player</td>
	                <td class='equipment'><input class="item" id='BluRay' name="BluRay" value='{{App\Type::where("name","Blu-ray Player")->first(["id"])["id"]}}' type="checkbox"> Blu Ray Player</td>
	                <td class='equipment'><input class="item" id='WhiteBoard' name="WhiteBoard" value='{{App\Type::where("name","Interactive Whiteboard")->first(["id"])["id"]}}' type="checkbox"> Interactive White Board</td>
	            </tr>
	            <tr>
	                <td class='equipment'><input class="item" id='Comp' name="Comp" value='{{App\Type::where("name","HDMI Laptop Cable")->first(["id"])["id"]}}' type="checkbox"> Computer</td>
	                <td class='equipment'><input class="item" id='MiniD' name="MiniD" value='{{App\Type::where("name","Mini DisplayPort Laptop Cable")->first(["id"])["id"]}}' type="checkbox"> Mini Displayport</td>
	                <td class='equipment'><input class="item" id='LecMic' name="LecMic" value='{{App\Type::where("name","Gooseneck Microphone")->first(["id"])["id"]}}' type="checkbox"> Lectern Microphone</td>
	            </tr>
	            <tr>
	                <td class='equipment'><input class="item" id='LavMic' name="LavMic" value='{{App\Type::where("name","Wireless Lavalier Microphone")->first(["id"])["id"]}}' type="checkbox"> Lavalier Microphone</td>
	                <td class='equipment'><input class="item" id='HandMic' name="HandMic" value='{{App\Type::where("name","Wireless Handheld Microphone")->first(["id"])["id"]}}' type="checkbox"> Handheld Microphone</td>
	                
	            </tr>
            </table>
        </div>
 
        <div class="form-group">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                <button type="submit" id='search' name='commit' class="btn btn-primary btn-block" style='display:inline-block;'>
                    <i class="glyphicon glyphicon-search"></i>Search Rooms
                </button>
           
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            	<button type="submit" id='reset' name='commit' class="btn btn-primary btn-block" style='display:inline-block;'>
                    <i class="glyphicon glyphicon-refresh"></i>Reset
                </button>
            </div>
        </div>
    </form>
    <br/>
	<div class='table-responsive'  style='overflow-x:hidden;'>
		<table  id='rooms' class='table table-hover table-striped table-responsive'>
			<thead>
				<tr>
					<th style='text-align:center'>Room</th>
				</tr>
			</thead>
			@foreach($rooms as $room)
			<tbody>
				<tr id="{{$room->id}}" 
				@if($room->has_problems)
					class="danger"
				@else
				class="success"
				
				@endif
				>

					<td  data-toggle="collapse" data-target="#{{$room->id}}_item" style='vertical-align:middle;'>
						@if(Auth::user()->is_registrar)
						<p>{{$room->barcode}}</p>
						@else
						<p style='float:right;'> Last checked  
							@if($room->time_checked == NULL)
							never
							@else
							on 
							@datetime($room->time_checked)
							@endif</p>
						<p>{{$room->barcode}}</p>
						@endif
						@if(count($items[$room->id]) != 0)
						<ul id="{{$room->id}}_item" class="collapse list-group" style="margin-left: auto; margin-right: auto; ">
							@foreach(($items[$room->id]) as $item)
							<a href='/issues/{{$item->id}}' style=''><li class="list-group-item 
							@if($item->has_problems)
							list-group-item-danger
							@else
							list-group-item-success
							@endif
							" style='display:inline-block; text-align:center; border:none'>{{$item->barcode}}</li></a>
							@endforeach
						</ul>
						@endif
					</td>	
				</tr>

			</tbody>
			@endforeach
		</table>
	</div>
</div>
@endsection