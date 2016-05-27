<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <title>NYU Tandon Media Support</title>
        <script type="text/javascript"  src="https://code.jquery.com/jquery-2.2.2.js"   
        integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE="   crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/sidebar.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
            <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.4/vue.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.16/vue-resource.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/vue-router/0.7.13/vue-router.min.js"></script>
        <style>

            @font-face {
              font-family: 'Gotham';
              src: url('fonts/gotham_book.eot'); /* IE9 Compat Modes */
              src: url('gotham_book.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                   url('gotham_book.woff2') format('woff2'), /* Super Modern Browsers */
                   url('gotham_book.woff') format('woff'), /* Pretty Modern Browsers */
                   url('gotham_book.ttf')  format('truetype'), /* Safari, Android, iOS */
            }
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Gotham',sans-serif;
            }

            /*.header{
                display:table-row;
                height: 5%;
                width: 100%;
                position: fixed;
                top:0;
                left: 0;
                right: 0;

            }*/

            #media{
                font-size:4vh; 
                color:#57068c; 
                font-weight:bolder; 
                display:inline-block; 
                margin:0;
                vertical-align: top;
                margin-top:3%;
            }

            .content {
                text-align: center;
                display: block;
                vertical-align: middle;
                margin-top: 15%;
            }

            .title {
                font-size: 96px;
            }

            #login{
                /*border: 1px solid black;*/
                text-decoration: none;
                margin: 3%;
                font-family: 'Gotham',sans-serif;
                display: inline;
                float: right;
                font-weight: bold;
                font-size:2vh; 
            }
            .divider{
                background:#57068c; 
                height:5px;
                width:100%; 
            }

            .vcenter {
                display: inline-block;
                vertical-align: middle;
                float: none;
                text-align: center;
            }

            html, body{
                height: 100%;
            }
            .container-table {
                display: table;
                height:90%;
            }
            .vertical-center-row {
                display: table-cell;
                vertical-align: middle;
            }
            .page-nav{
                display:table-row;
            }

            .top-bar{
                z-index: 999;
            }
            .form-group{
                margin-bottom: 0px;
            }
            .editable-click, a.editable-click, a.editable-click:hover{
                border-bottom: 0px;
            }
            a{
                color:black;
            }
        </style>
        <script>
        $(document).ready(function(){
            var top = $('.top-bar').offset();
            $('.trigger').click(function () {
                $('.top-bar').css('position','');  
                $('.left2').toggle('slow',function(){
                    top = $('.top-bar').offset().top;
                });

            });



            $(document).scroll(function(){
                //calculating the minimal top position of the div
                $('.top-bar').css('position','');
                top = $('.top-bar').offset().top;

                $('.top-bar').css('position','absolute');                 
                $('.top-bar').css('top',Math.max(top,$(document).scrollTop()));
             });
        });
        </script>
    </head>
    <body>
        @if(Auth::check())
        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="{{ url('/home') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/roomcheck')}}">Room Check</a>
                    </li>
                    <li>
                        <a href="{{url('/loan')}}">Loan Equipment</a>
                    </li>
                    <li>
                        <a href="{{url('/return')}}">What's still out?</a>
                    </li>
                    <li>
                        <a href="{{url('/issues')}}">Issues</a>
                    </li>
                    @if(Auth::user()->is_authorized) 
                    <li>
                        <a href="{{url('/types')}}">Types</a>
                    </li>
                    <li>
                        <a href="{{url('/assets')}}">Assets</a>
                    </li>
                    <li>
                        <a href="{{url('/attributes')}}">Attributes</a>
                    </li>
                    <li>
                        <a href="{{url('/users')}}">Users</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url('/logout') }}"> Logout</a>
                    </li>
                </ul>
            </div>
            @endif
            <div id="page-content-wrapper">
                <div class = "container-fluid "id='header'>
                    <div class="container-fluid">
                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-6 " ><!--style='display:table-cell; text-decoration:none;'>-->
                            @if(Auth::check())
                             <a href = "/home" style='display:inline;'>
                            @else
                            <a href = "/" style='display:inline;'>
                            @endif
                                <img src = "/img/medsup.jpg" width="100%"/>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-md-3 col-xs-4" >
                        
                         <!-- <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 vcenter'> -->
                             <!-- <div class="btn-group-justified"> -->
                            @if(Auth::check())
                            <a style='display:inline-block; text-decoration: none; color:black; float:right; margin-left: 20px;'><h2 style='display:inline-block;'><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" id="menu-toggle"></span></h2></a>
                            <h2 style='display:inline-block; float:right;'><a  style='display:inline-block; text-decoration: none; color:black;' href="{{ url('/profile') }}"> Hi {{Auth::user()->first_name}}</a></h2>                
                            @else
                            <h2 style='display:inline-block; float:right;'><a  style='display:inline-block; text-decoration: none; color:black;' href="{{ url('/login') }}"> Login </a></h2>
                            @endif
                                <!-- <a class = "btn btn-default" role = "button" href="{{url('/home')}}">Home</a>
                                
                                <a class = "btn btn-default" role = "button"  href="{{ url('/logout') }}">Logout</a>
                                
                                <a class="btn btn-default" id='login' href="{{url('/login')}}">Login</a>
                                 -->
                            <!-- </div>  -->
                            
                        </div>

                        <div class='divider col-lg-12 col-md-12 col-sm-12 col-xs-12'></div>
                    </div>
                </div>
                <div class="container-fluid top-bar">
                        @yield('bar')
                </div>
                <div class="container container-table">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script>
    
    $(document).ready(function(){
        $("#wrapper").toggleClass("toggled");
    });
    $("#wrapper").click(function(e){
        if($(e.target).is("#menu-toggle")){
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        }
        else if($(e.target).is("li")){}
        else{
            $("#wrapper").addClass("toggled");
        }
    });
    </script>
    </body>
</html>
