
@extends('layouts.app')


@section('content')

<div id="roomcheck">
    <select v-on:change="fetchEquipments(selected)" v-model = "selected">
        <option v-for="room in rooms" v-bind:value="room.id">
        		@{{room.barcode}}
        </option>
    </select> 
    <!-- @{{equipments | json}} -->
  	<form class="form-horizontal" role="form" method="POST" >
  		<div class="form-group" v-for='equipment in equipments'>
            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-2 control-label" >@{{equipment.type.name}}</label>
            <!-- <br/> -->
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
		        <input type="checkbox" id="checkbox" value='@{{equipment.id}}' v-model='checkedParts'>
	        </div>
        </div>
        <span>Errors: @{{ checkedParts | json }}</span>
  	</form>
	
</div>

<script src='/js/roomcheck.js' type='text/javascript'></script>

@endsection
