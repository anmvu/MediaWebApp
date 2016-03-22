<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <title>NYU Tandon Media Support</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
                display: table-cell;
                vertical-align: middle;
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
            .vertical-center {
              min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
              min-height: 90vh; /* These two lines are counted as one :-)       */

              display: flex;
              align-items: center;
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
        </style>
    </head>
    <body>
        <div class = "container-fluid">
            <div class="container-fluid">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 " ><!--style='display:table-cell; text-decoration:none;'>-->
                    <a href = "/" style='display:inline;'>
                        <img src = "img/medsup.jpg" width="85%"/>
                    </a>
                </div>
                @if(Auth::check())
                <!-- <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 vcenter'> -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3row ">
                    <div class="vcenter">
                        <a class = "btn btn-default" role = "button" href="{{url('/home')}}">Home</a>
                        <a class = "btn btn-default" role = "button"  href="{{ url('/users/profile') }}">{{Auth::user()->first_name}}</a>
                        <a class = "btn btn-default" role = "button"  href="{{ url('/logout') }}">Logout</a>
                        @else
                        <a class="btn btn-default" id='login' href='/login'>Login</a>
                        @endif
                </div>
                </div>
                <div class='divider col-lg-12'></div>
            </div>
        </div>
        <div class="container container-table">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
