@extends('front.layout.index')
@section('title')
<title>HOME | CAR DEALER</title>
@endsection
@section('contents')
<!-- Banner -->
<section id="banner" class="major">
	<div class="inner">
		<header class="major">
			<h1>Get Best Cars</h1>
		</header>
		<div class="content">
			<p>We are providing best Car Deals</p>
			<ul class="actions">
				<li><a href="{{route('contact.index')}}" class="button next scrolly">Contact us</a></li>
			</ul>
		</div>
	</div>
</section>
<div id="main">
		<section id="one">
			<div class="inner">
				<header class="major">
					<h1>Borwse By Make</h1>
				</header>
				
				<div class="row">
					@foreach(App\Models\Category::all() as $category)
					<div class="col-md-3 col-sm-6 co-xs-12 text-center">


						<a href="{{route('category.show',str_replace(' ', '_',$category->name))}}">
							<h3>{{$category->name}}</h3>

							<h4><em>({{$category->cars->count()}} Cars)</em></h4>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- Featured Cars -->
		<section>
			<div class="inner">
				<ul class="actions">
					<li class="text-center"><a href="{{route('category.index')}}" class="button next">View More Car Categories</a></li>
				</ul>
			</div>
		</section>
		<section>
			<div class="inner">
				<header class="major">
					<h2>Cars</h2>
				</header>
			</div>
		</section>
		<section class="tiles">
			@foreach(App\Models\Car::all() as $car)
			<article>
				<span class="image">
					<img src="{{asset(@$car->images->first()->image)}}" alt="" />
				</span>

				<header class="major">
					<p>
						<i class="fa fa-dashboard"></i> {{$car->mileage}} &nbsp;&nbsp;
						<i class="fa fa-cube"></i> {{$car->engine}}&nbsp;&nbsp;
						<i class="fa fa-cog"></i> {{@$car->transmission}}
					</p>

					<h3>{{$car->name}}</h3>

					<p> <strong> ${{$car->price}}</strong></p>

					<p>{{$car->chassis_no}}  /  {{$car->fuel_type}}  /  {{$car->year}}  /  {{$car->condition}} vehicle</p>

					

					<div class="major-actions">
						<a href="{{route('cars.show',str_replace(' ', '_',$car->name))}}" class="button small next">View Car</a>
					</div>
				</header>
			</article>
			@endforeach
		</section>
		<section>
			<div class="inner">
				<ul class="actions">
					<li class="text-center"><a href="{{route('cars.index')}}" class="button next">View More Cars</a></li>
				</ul>
			</div>
		</section>
		<section id="one">
			<div class="inner">
				<header class="major">
					<h1>Search By Type</h1>
				</header>
				
				<div class="row">
					@foreach(App\Models\Type::all() as $type)
					<div class="col-md-3 col-sm-6 co-xs-12 text-center">


						<a href="{{route('type.show',str_replace(' ', '_',$type->name))}}">
							<h3>{{$type->name}}</h3>

							<h4><em>({{$type->cars->count()}} Cars)</em></h4>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- Featured Cars -->
		<section>
			<div class="inner">
				<ul class="actions">
					<li class="text-center"><a href="{{route('type.index')}}" class="button next">View More Car Types</a></li>
				</ul>
			</div>
		</section>
		<!-- About us -->
		@php 
		$setting = App\Models\Setting::first();
		@endphp
		<section>
			<div class="inner">
				<header class="major">
					<h2>{{$setting->about_us_title}}</h2>
				</header>
				<p>{!! @$setting->about_us !!}</p>
				<ul class="actions">
					<li><a href="{{route('about.index')}}" class="button next">Read more</a></li>
				</ul>
			</div>
		</section>
		<section id="one">
			<div class="inner">
				<header class="major">
					<h1>Search By Country</h1>
				</header>
				
				<div class="row">
					@foreach(App\Models\Country::all() as $country)
					<div class="col-md-3 col-sm-6 co-xs-12 text-center">


						<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}">
							<h3>{{$country->name}}</h3>

							<h4><em>({{$country->cars->count()}} Cars)</em></h4>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- Featured Cars -->
		<section>
			<div class="inner">
				<ul class="actions">
					<li class="text-center"><a href="{{route('country.index')}}" class="button next">View More Countries</a></li>
				</ul>
			</div>
		</section>
		<!-- Blog Posts -->
		<section>
			<div class="inner">
				<header class="major">
					<h2>Blogs</h2>
				</header>
			</div>
		</section>
		<section class="tiles">
			@foreach(App\Models\Blog::all()->take(6) as $blog)
			<article>
				<span class="image">
					<img src="{{asset($blog->image)}}" alt="" />
				</span>
				<header class="major">
					<h3>{{$blog->title}}</h3>

					<p><br> <span>{{$blog->category->name}}</span> | <span>{{$blog->created_at->format('d M,Y')}} </span> | <span>{{{$blog->view}}}</span></p>

					<div class="major-actions">
						<a href="{{route('blog.show',str_replace(' ', '_',$blog->title))}}" class="button small next scrolly">Read Blog</a>
					</div>
				</header>
			</article>
			@endforeach
		</section>
		<section>
			<div class="inner">
				<ul class="actions">
					<li class="text-center"><a href="{{route('blog.index')}}" class="button next">View More Blogs</a></li>
				</ul>
			</div>
		</section>
		<!-- Testimonials -->
		<section>
			<div class="inner">
				<header class="major">
					<h2>Testimonials</h2>
				</header>
				<div class="row">
					@foreach(App\Models\Review::all()->take(4) as $review)
					<div class="col-6">
						<p><em>"{!! @$review->description !!}"</em></p>
						<p><strong>- {{@$review->name}}</strong></p>
						
					</div>
					@endforeach
				</div>
				<ul class="actions">
					<li><a href="{{route('testimonials.index')}}" class="button next">Read more</a></li>
				</ul>
			</div>
		</section>
</div>
@endsection