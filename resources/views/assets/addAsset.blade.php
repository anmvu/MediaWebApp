@extends('layouts.app')
@include('assets.assetBar')
@section('content')
<script>
$(document).ready(function() {
    formmodified=0;
    $('form *').change(function(){
        formmodified=1;
    });
    $("input[name='commit']").click(function() {
        formmodified = 0;
    });
    if (formmodified == 1) {
        window.onbeforeunload = confirmExit;
        function confirmExit() {
            return "New information not saved. Do you wish to leave the page?";
        }
    }
    
});
</script>
	<h1> Add Asset Form </h1>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('assets/add') }}">
		{{ csrf_field() }}
        <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4  control-label">Barcode</label>
            <!-- <br/> -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  dropdown">
                <input type="text" class="form-control" name="barcode" value="{{ old('barcode') }}"> 
            </div>
        </div>
        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4  control-label">Type</label>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select name="type">
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4  control-label">Container</label>
            <!-- <br/> -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select name="room">
                    <option value="0">None</option>
                    @foreach ($rooms as $room)
                        <option value="{{$room->id}}">{{$room->barcode}}</option>
                    @endforeach
                </select>
            </div>        
        </div>
        <div class="form-group{{ $errors->has('is_container') ? ' has-error' : '' }}">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4  control-label">Is Container</label>
            <!-- <br/> -->
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 radio">
                <label>
                    <input type="radio" name="is_container" id="optionsRadio1" value="1" checked>
                    Yes
                </label>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 radio">
                <label>
                    <input type="radio" name="is_container" id="optionsRadio2" value="0">
                    No
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                <button type="submit" name='commit' class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Add asset
                </button>

            </div>
        </div>
    </form>


@endsection