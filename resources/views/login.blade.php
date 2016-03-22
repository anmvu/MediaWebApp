@extends('layouts.app')

@section('content')
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
		{{ csrf_field() }}
        <div class="form-group">

            <label class="col-md-4 control-label">Barcode for Students, UniversityID for admin</label>
            <!-- <br/> -->
            <div class="col-md-4">
                @if ($errors->has('user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                    </span>
                    <br/>
                @endif
                <input type="password" class="form-control" name="user" value="{{ old('user') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Login
                </button>

            </div>
        </div>
    </form>
    
@endsection