<!-- //vue.js
//listen to dropdown, clear div, add elements based on value.
//create an array in a controller - array keys are rooms
// array values would be array of the checkbox names and values

[JAB474] => {
	[name] => 'microphone',
	[value] => 'description of problem'
} 
//fetch all the stuff that's in that room into vue.js
//

-->
@extends('layouts.app')


@section('content')
<script src='/js/roomcheck.js' type='text/javascript'></script>

<div id="roomcheck">
</div>


@endsection
