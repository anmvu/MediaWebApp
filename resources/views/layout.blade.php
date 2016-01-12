<html>
	<head>
		<style>
		    html, body {
		        height: 100%;
		    }

		    body {
		        margin: 0;
		        padding: 0;
		        width: 100%;
		        font-weight: 100;
		        font-family: 'Lato';
		    }

		    .container {
		        width:80%;
		        margin-right: auto;
		        margin-left: auto; 
		    }
		    .header{
		    	height: 10%;
		    	margin-top: 2%;
		    }
		</style>
	</head>
	<body>
		<div class='container'>
			<div class='header'>
				<img src='http://engineering.nyu.edu/files/tandon_long_color.png' width='100%' height='100%'>
			</div>

				@yield('content')
		</div>
	</body>
</html>