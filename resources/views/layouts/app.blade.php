<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <title>NYU Tandon Media Support</title>

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

            .header{
                display:table-row;
                height: 5%;
                width: 100%;
                position: fixed;
                top:0;
                left: 0;
                right: 0;

            }

            #media{
                font-size:4vh; 
                color:#57068c; 
                font-weight:bolder; 
                display:inline-block; 
                margin:0;
                vertical-align: top;
                margin-top:3%;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
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
                height:10%;
                width:100%; 
            }
        </style>
    </head>
    <body>
        <div class = "header">
            <div style='display:table-cell; text-decoration:none;'>
                <a href = "/" style='display:inline;'>
                    <img src = "img/medsup.jpg" width="85%"/>
                </a>
                @if(Auth::check())
                <a href="{{url('/home')}}">Home</a>
                <a href="{{ url('/user/profile') }}">{{Auth::user()}}</a>
                <a href= {{Auth::logout()}}>Logout</a>
                @else
                <a id='login' href='/login'>Login</a>
                @endif
                
            </div>
            <div class='divider'></div>
            
        </div>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
