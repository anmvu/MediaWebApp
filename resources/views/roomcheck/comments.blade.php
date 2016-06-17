@extends('layouts.app')
@section('content')


<h1> Add Comments for {{$room->barcode}} </h1>
<form class="form-horizontal" role="form" method="POST" action="{{ URL::full() }}">
	{{ csrf_field() }}
	@foreach($assets as $asset)
    <div class="form-group">
        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1  control-label">{{$asset->type->name}}</label>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  dropdown">
            <textarea type="text" class="form-control" name="{{$asset->id}}" value="{{ old('comment') }}"></textarea>
            
        </div>
        <label class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control-label">Priority</label>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  dropdown">
		    <select name='{{$asset->id}}_priority'>
		    	<option value='High'>High</option>
		    	<option value='Medium'>Medium</option>
		    	<option value='Low'>Low</option>
		    </select>
	    </div>
    </div>
    @endforeach
	<input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}"> 
    <div class="form-group">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
            <button type="submit" name='commit' class="btn btn-primary btn-block">
                <i class="fa fa-btn fa-sign-in"></i>Submit
            </button>

        </div>
    </div>
</form>




@endsection