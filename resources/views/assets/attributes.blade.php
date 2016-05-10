@extends('layouts.app')
@include('assets.assetBar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type='text/javascript'>
$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#user').editable({
        success: function(response, newValue) {
            console.log(response);
            if(response.status == 'error') return response.msg; //msg will be shown in editable form
        }
    });

    $('.pUpdate').editable({
        validate: function(value) {
            if($.trim(value) == '')
                return 'Value is required.';
        },
        type: 'text',
        title: 'Edit Value',
        placement: 'top',
        send:'always',
        ajaxOptions: {
            dataType: 'json',
            type: 'post'
        }
    });


});

$(function () {

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $('#add').on('submit', function (e) {

        e.preventDefault();

        var id = this.attribute.value;
        var value = this.val.value;
        var select = "#attribute option[value='"+id+"']";
        var attribute = $(select).text();
        $.ajax({
            url:'/assets/{{$id}}/add',
            type: 'post',
            data: {'attribute':this.attribute.value,'value':this.val.value},
            success:function(data){
                $(select).remove();
                $("#value").val("");
                var htmlStuff = '<tr id='+id+'><td style=\'vertical-align:middle;\'>'+attribute+'</td><td style=\'vertical-align:middle;\'>'+value+'</td><td style=\'vertical-align:middle;\'><form class="form-horizontal" class=\'delete\' role="form" method="POST"><div class="form-group"><div class="col-lg-5 col-lg-offset-4" style=\'text-align:center\'><input type=\'hidden\' class=\'id\' name=\'id\' value='+id+'></input></div></div></form></td></tr>';
                if ({{sizeOf($linked)}} == 0){
                    htmlStuff = '<table class=\'table table-hover table-striped table-responsive\'><thead><tr><th style=\'text-align:center\'>Attribute</th><th style=\'text-align:center\'>Value</th></tr></thead><tbody>'+htmlStuff+'</tbody></table>';
                    $(".table-responsive").append(htmlStuff);
                }
                else $(htmlStuff).insertBefore('table > tbody > tr:first');

            }
        });
    });

    $('.delete').on('submit', function (e) {
        e.preventDefault();
        var this_id = this.id.value;

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        console.log(this_id);

        // $.ajax({
        //     url:'/assets/{{$id}}/delete',
        //     type: 'post',
        //     data: {'id': this_id},
        //     success:function(data){
        //         console.log(data);
        //         $("#"+this_id).remove();
        //         // $("#"+this_id).remove();
        //     }
        // });
    });

});

</script>
<form class="form-horizontal"  id='add'role="form" method="POST" >
    <div class="form-group">

        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Attribute</label>
        <!-- <br/> -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <select id='attribute' name="attribute">
                @foreach ($attributes as $attribute)
                    <option value="{{$attribute->id}}">{{$attribute->label}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">

        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Value (i.e. Barcos)</label>
        <!-- <br/> -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dropdown">
            <input type="text" id="value" class="form-control" name="val" value="{{ old('value') }}"> 
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
            <button type="submit" name='commit' class="btn btn-primary btn-block">
                Add attribute
            </button>
        </div>
    </div>
</form>

<div class='table-responsive'>
    @if(sizeOf($linked) > 0)
    <table class='table table-hover table-striped table-responsive'>
        <thead>
            <tr>
                <th style='text-align:center'>Attribute</th>
                <th style='text-align:center'>Value</th>
                <!-- <th style='text-align:center'>Remove Link</th> -->
            </tr>
        </thead>
        @foreach($linked as $link)
        <tbody>
            <tr id="{{$link->attribute_id}}">
                <td style='vertical-align:middle;'>
                    {{$link->attribute->label}} 
                </td>
                <td style='vertical-align:middle;'>
                    <a href="#" name='value' id="value" data-type="text" data-pk="1" data-title="Enter value" class="editable editable-click pUpdate" data-url="/assets/{{$id}}/edit/{{$link->attribute_id}}" style="display: inline;">
                        {{$link->value}}
                    </a>

                </td>
                <!-- <td style='vertical-align:middle;'>
                    <form class="form-horizontal" class='delete' role="form" method="POST">
                        <div class="form-group">
                            <div class="col-lg-5 col-lg-offset-4" style='text-align:center'>
                                <input type='hidden' class='id' name='id' value='{{$link->attribute_id}}'></input>
                                <button type="submit" class="btn btn-danger btn-block">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </td> -->
            </tr>
        </tbody>
        @endforeach
    </table>
    @endif
</div>
    


@endsection