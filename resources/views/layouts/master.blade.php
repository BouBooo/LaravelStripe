<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
    <title>Laravel Ecommerce</title>
	
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>


	{{-- <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message')}}
            </div>
        @endif
    </div> --}}
    <div id="app">
		@include('layouts.header')
		<!-- App content -->
		@yield('content')
		
		@include('layouts.footer')

		<script src="https://js.stripe.com/v3/"></script>
		@yield('js')
	</div>
	
    
    <!-- FontAwesome -->
	<script src="https://kit.fontawesome.com/907683f3ba.js"></script>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{ asset('js/script.js')}}"></script>
	<script src="{{ asset('js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{ asset('js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('js/jquery.sticky.js')}}"></script>
	<script src="{{ asset('js/nouislider.min.js')}}"></script>
	<!-- <script src="js/countdown.js"></script> -->
	<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{ asset('js/gmaps.min.js')}}"></script>
	<script src="{{ asset('js/main.js')}}"></script>
</body>

</html>