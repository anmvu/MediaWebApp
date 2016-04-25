<!-- //vue.js
//listen to dropdown, clear div, add elements based on value.
//create an array in a controller - array keys are rooms
// array values would be array of the checkbox names and values

[JAB474] => {
	[name] => 'microphone',
	[value] => 'description of problem'
} -->
@extends('layouts.app')

@include('user.userBar')

@section('content')
<!--<script type='text/javascript'>
 $('#dbType').on('change',function(){
        if( $(this).val()==="other"){
        $("#otherType").show()
        }
        else{
        $("#otherType").hide()
        }
    });
</script>
<select name='rooms'>
	@foreach ($rooms as $room)
		<option value="{{$room->id}}">{{$room->barcode}}</option>
	@endforeach
</select>-->
<select>
    <option v-repeat:"room: rooms">
    @{{ room.barcode }}
  </option>
</select>



@endsection
<!-- <form>
<div changeable></div>
</form> -->