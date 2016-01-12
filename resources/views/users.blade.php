@extends('layout')

@section('content')
<style>
    .login{
        height: 50%;
        display: table-row;
    }
    .login-type {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        font-size: 6vw;
    }
    #login-container{
        display: table;
        height: 85%;
        width: 100%;
        border-collapse:  separate;
    }
    a{
        text-decoration: none;
        color: black;
    }
</style>
<div id='login-container'>
    <a href='student-login'class ='login'>
        <p class='login-type'> Student</p>
    </a>
    <a href='authorized-login' class ='login'  style='background: rgb(87,6,140)'>
            <p class='login-type' style='color:white'> Authorized </p>
    </a>
</div>

@stop