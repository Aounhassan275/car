<!DOCTYPE HTML>
<html>
	<head>
        @yield('title')
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('front/assets/bootstrap/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}" />
		<noscript><link rel="stylesheet" href="{{asset('front/assets/css/noscript.css')}}" /></noscript>
		@toastr_css
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
			
				<!-- Header -->
				<header id="header" class="alt">
					<a href="{{url('/')}}" class="logo"><strong>Car Dealer</strong> <span>Website</span></a>
					<nav>
						<a href="#menu">Menu</a>
					</nav>
				</header>

				<!-- Menu -->
				<nav id="menu">
					<ul class="links">
		                <li class="active"> <a href="{{route('home.index')}}">Home </a> </li>

		                <li> <a href="{{route('cars.index')}}">Cars</a> </li>
		                <li> <a href="{{route('blog_category.index')}}">Blog Category</a> </li>
		                <li> <a href="{{route('blog.index')}}">Blog</a> </li>
		                <li> <a href="{{route('testimonials.index')}}">Testimonials</a> </li>
		                <li> <a href="{{route('bank_details.index')}}">Bank Details</a> </li>
		                <li><a href="{{route('contact.index')}}">Contact Us</a></li>
						<li> <a href="{{route('about.index')}}">About Us</a> </li>
		                <li><a href="{{route('sales_terms.index')}}">Sales Terms</a></li>
		                <li><a href="{{route('faqs.index')}}">FAQ</a></li>
            		</ul>
				</nav>
                @yield('contents')
				@php 
				$setting = App\Models\Setting::first();
				@endphp
				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="icons">
							<li><a href="{{@$setting->twitter_link}}" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="{{@$setting->facebook_link}}" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="{{@$setting->instagram_link}}" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
							{{-- <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li> --}}
						</ul>
						<ul class="copyright">
							<li>Copyright © 2022 Reserved by:</li>
							<li> <a href="{{url('/')}}">CarDealer.com</a></li>
						</ul>
					</div>
				</footer>

			</div>

		<!-- Scripts -->
			<script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('front/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
			<script src="{{asset('front/assets/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('front/assets/js/jquery.scrollex.min.js')}}"></script>
			<script src="{{asset('front/assets/js/browser.min.js')}}"></script>
			<script src="{{asset('front/assets/js/breakpoints.min.js')}}"></script>
			<script src="{{asset('front/assets/js/util.js')}}"></script>
			<script src="{{asset('front/assets/js/main.js')}}"></script>
			@toastr_js
			@toastr_render
            @yield('scripts')
	</body>
</html>