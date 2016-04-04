@extends('layouts.app')
@section('content')

<h1> Hi {{$user->first_name}}!</h1>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
		{{ csrf_field() }}
        <div class="form-group">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">First Name</label>
            <!-- <br/> -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" name="first" value="{{ $user->first_name }}">
            </div>
        </div>
         <div class="form-group">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Last Name</label>
            <!-- <br/> -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" name="last" value="{{$user->last_name}}">
            </div>
        </div>
         <div class="form-group">

            <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Phone Number</label>
            <!-- <br/> -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" name="phone" value="{{ $user->phone_num }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Save
                </button>

            </div>
        </div>
    </form>

@endsection