<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dirty Little Secret</title>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Abel|Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Main Quill library -->
	<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

	<!-- Theme included stylesheets -->
	<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

	<!-- Core build with no theme, formatting, non-essential modules -->
	<link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
	<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
	
	<style type="text/css">
		@font-face{
			font-family: 'baskervillebold';
			src: url("{{ asset('fonts/baskerville/bold.otf')}}");
		}

		@font-face{
			font-family: 'baskervilleboldit';
			src: url("{{ asset('fonts/baskerville/italic.otf')}}");
		}

		@font-face{
			font-family: 'baskervillenormal';
			src: url("{{ asset('fonts/baskerville/normal.ttf')}}");
		}

		@font-face{
			font-family: 'nimbus';
			src: url("{{ asset('fonts/nimbus.otf')}}");
		}

		@font-face{
			font-family: 'roman';
			src: url("{{ asset('fonts/baskerville/roman.otf')}}");
		}

	</style>

	<link rel="stylesheet" href="{{ asset('css/app.css')}}?ver=<?php echo rand(1,1000);?>" crossorigin="anonymous">
	
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<div class="se-pre-con"></div>
	<div id="header">
		<div id="navlg">
			<ul id="mainnavul" class="mainnavul">
				<li><a href="/">Home</a></li>
				<li><a href="/retail-menu">Retail Menu</a></li>
			</ul>
			<img src="{{asset('img/logo.png')}}" class="mainnavul logo navlogo">
			<ul class="mainnavul">
				<li><a href="#">Order Online</a>
					<ul>
						@foreach($cakegories as $cakegory)
							<li><a href="/cakegory/{{$cakegory->slug}}">{{$cakegory->name}}</a></li>
						@endforeach
					</ul>
				</li>
				<li><a href="/contact">Contact Us</a></li>
			</ul>
			<div id="shoppingcart">
				<a href="/cart"><img src="/img/cart.png"></a>
				@if(Request::session()->get('cart'))
				<div id="count">{{count(Request::session()->get('cart'))}}</div>
				@endif
			</div>
		</div>
		
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="mobilenav">
		  <a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" class="mobilenav-logo"></a>
		  <button style="float: right; margin-top: 20px; margin-right: 20px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/retail-menu">Retail Menu</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Order Online</a>
		      </li>
		      	@foreach($cakegories as $cakegory)
			      <li class="nav-item">
			        <a class="dropdown-item" href="/cakegory/{{$cakegory->slug}}">{{$cakegory->name}}</a>
			      </li>
				@endforeach
		      
		      <li class="nav-item">
		        <a class="nav-link" href="/contact">Contact Us</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</div>
	

	<div id="main">
		@yield('content')
	</div>

<div id="footer" class="dls-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-item">
				<ul>
					<li class="nimbus"><a href="/"><h5>HOME</h5></a></li>
					<li class="nimbus"><a href="/retail-menu"><h5>RETAIL MENU</h5></a></li>
					<li class="nimbus"><a href="/cakegory/wholecakes"><h5>ORDER ONLINE</h5></a></li>
				</ul>
			</div>
			<div class="col-md-4 footer-item">
				<h3 class="nimbus" style="color: white; text-transform: uppercase;">Connect With Us</h3>
				<div class="footer-social">
					<a href="https://www.facebook.com/dirtylittlesecretmm/">
						<img src="{{asset('img/fb.png')}}">
					</a>
				</div>
				<div class="footer-social">
					<a href="https://www.instagram.com/dirtylittlesecret_mm/">
						<img src="{{asset('img/insta.png')}}">
					</a>
				</div>
				<div class="footer-social">
					<a href="https://www.facebook.com/messages/t/dirtylittlesecretmm">
						<img src="{{asset('img/messenger.png')}}">
					</a>
				</div>
			</div>
			<div class="col-md-4 footer-item">
				<h3 class="nimbus" style="color: white; text-transform: uppercase;">Contact Us</h3>
				<p style="color: white; ">+95 96901 2000 ( MYANMAR )</p>
				<p style="color: white; ">+95 96901 8000 ( ENGLISH )</p>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script type="text/javascript">
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</body>
</html>