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
                height: 15%;
                width: 80%;
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
        </style>
    </head>
    <body>
        <div class = "header">
            <a href = "/" style='display:table-cell; text-decoration:none;'>
                <img src = "img/tandon.png" height="35%"/>
                <span id = "media">Media Support</span>
            </a>
        </div>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
