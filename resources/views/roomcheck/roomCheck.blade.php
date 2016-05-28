@extends('layouts.app')
@section('content')
<meta name="csrf-token" id='token' value="{{ csrf_token() }}">

<div id="roomcheck">
  <select v-on:change="fetchEquipments(selected)" v-model = "selected">
      <option v-for="room in rooms" v-bind:value="room.id">
      		@{{room.barcode}}
      </option>
  </select> 
  <!-- @{{equipments | json}} -->

  <p v-if="showForm">@{{checked}}</p>
	<form class="form-horizontal" role="form" v-if="showForm">
		<div class="form-group" v-for='equipment in equipments'>
        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-2 control-label" >@{{equipment.type.name}}</label>
        <!-- <br/> -->
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
	        <input class='checkboxes' type="checkbox" id="checkbox@{{equipment.id}}" value='@{{equipment.id}}' v-model='checkedParts'>
        </div>
    </div>

    <div class="form-group" >
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
        <button type="submit" name='action' class="btn btn-primary btn-block" value="bug" v-if="checkedParts.length < 0">
          <i class="fa fa-btn fa-sign-in"></i>Weird Bug
        </button>
        <button type="submit" name='action' id ="@{{selected}}" class="btn btn-primary btn-block" value="roomclear" v-if="checkedParts.length == 0" v-on:click='roomClear'>
          <i class="fa fa-btn fa-sign-in"></i>Room Clear
        </button>
        <button type="submit" name='action' class="btn btn-primary btn-block" v-if="checkedParts.length > 0" value="next"  v-on:click='next'>
          <i class="fa fa-btn fa-sign-in"></i>Next
        </button>
      </div>  
    </div>
	</form>
</div>

<script src='/js/roomcheck.js' type='text/javascript'></script>

@endsection
