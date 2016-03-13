@extends('layouts.app')

@section('content')

	<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
		
        <div class="form-group">
            <label class="col-md-4 control-label">Barcode for Students, UniversityID for admin</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="user" value="{{ old('user') }}">

                @if ($errors->has('user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i>Login
                </button>

            </div>
        </div>
    </form>
    
@endsection