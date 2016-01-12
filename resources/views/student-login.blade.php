@extends('layout')

@section('content')
<style>
    .form-container{
        display: table;
        height: 85%;
        width: 100%;
        border-collapse:  separate;
        text-align:center;
        font-size:32px;
    }
</style>
{{ Form::open(array('url'=>'student-login')) }}
<h1> Student Login </h1>
<p>
    {{ $errors->first('barcode') }}
</p>

<p>
    {{ Form:: label ('barcode', 'Scan Barcode') }}
    {{ Form:: text('barcode', Input::old('email'), array('placeholder'=>'1234567890'))}}
</p>

<p>
    {{ Form::submit('Submit')}}
</p>

{{Form::close()}}

@stop
