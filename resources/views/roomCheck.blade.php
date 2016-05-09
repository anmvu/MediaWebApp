@extends('layouts.app')
@section('content')

<div id="roomcheck">
    <select v-on:change="fetchEquipments(selected)" v-model = "selected">
        <option v-for="room in rooms" v-bind:value="room.id">
        		@{{room.barcode}}
        </option>
    </select> 
    <!-- @{{equipments | json}} -->
  	<form class="form-horizontal" role="form" method="POST" v-if="showForm">
  		<div class="form-group" v-for='equipment in equipments'>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-2 control-label" >@{{equipment.type.name}}</label>
          <!-- <br/> -->
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
  	        <input class='checkboxes' type="checkbox" id="checkbox@{{equipment.id}}" v-on:change="checked(checkedParts)" value='@{{equipment.id}}' v-model='checkedParts'>
	        </div>
      </div>
      <div class="form-group" >
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
          <button type="submit" name='action' class="btn btn-primary btn-block" value="clear" formaction="/roomcheck/@{{equipment.id}}/">
            <i class="fa fa-btn fa-sign-in"></i>Room Clear
          </button>
          <button type="submit" name='action' class="btn btn-primary btn-block" v-if="checkedParts.length > 0" value="next" formaction="/roomcheck/@{{equipment.id}}/checkedParts">
            <i class="fa fa-btn fa-sign-in"></i>Next
          </button>
        </div>  
  	</form>
	
</div>

<script src='/js/roomcheck.js' type='text/javascript'></script>

@endsection
