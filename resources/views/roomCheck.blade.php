
@extends('layouts.app')


@section('content')

<div id="roomcheck">
    <select v-on:change="fetchEquipments(selected)" v-model = "selected">
        <option v-for="room in rooms" v-bind:value="room.id">
        		@{{room.barcode}}
        </option>
    </select> 
    @{{equipments}}
    <form class="form-horizontal" role="form" method="POST" action="{{ url('users/add') }}">

</div>

<script src='/js/roomcheck.js' type='text/javascript'></script>

@endsection
