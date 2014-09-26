<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}Example</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Bootstrap -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />

	<link href="http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />

	<style>
		html {
			background: url({{ asset('assets/site-images/background.jpg') }}) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}

		body {
			padding-top: 20px;
			font-size: 16px;
			font-family: "Open Sans",serif;
			background: transparent;
		}

		h1 {
			font-family: "Abel", Arial, sans-serif;
			font-weight: 400;
			font-size: 40px;
		}
		h2 {
            font-family: "Abel", Arial, sans-serif;
            font-weight: 300;
            font-size: 30px;
        }

		/* Override B3 .panel adding a subtly transparent background */
		.panel {
			background-color: rgba(255, 255, 255, 0.9);
			padding-bottom: 20px;
		}

		.margin-base-vertical {
			margin: 20px 0;
		}

		span {
		    color: #806a13;
		    border-bottom: 1px dotted #f1ca47;
		}
		a {
		    color: #f1ca47;
		}

	</style>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 panel panel-default">

				<h1 class="margin-base-vertical">
				    Hi {{ $userFullName }},
				</h1>
				<h2>
				    Thank you vary much for registering our site.
				</h2>

				<p>
					We send a confirmation e-mail to this address - <span>{{ $userEmail }}</span>
				</p>
				<p>
					to activate your account, click that link. Stay with us all the time.
				</p>
				<hr/>

				<p>
					Now you can visit our site - <a href="{{ URL::route('home') }}">Home</a>
				</p>

			</div><!-- //main content -->
		</div><!-- //row -->
	</div> <!-- //container -->

</body>
</html>