<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,">
    <meta name="description" content="CARS">
	<meta name="author" content="Bootlab">
    <title>ADMIN PANEL | CARS</title> 
	<link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">	

	<link rel="preconnect" href="{{asset('//fonts.gstatic.com/')}}" crossorigin="">

	<!-- PICK ONE OF THE STYLES BELOW -->
    <link href="{{asset('css/classic.css')}}" rel="stylesheet"> 
	<!-- <link href="{{asset('css/corporate.css')}}" rel="stylesheet"> -->
	<!-- <link href="{{asset('css/modern.css')}}" rel="stylesheet"> -->
	{{-- <script src="{{asset('js/settings.js')}}"></script> --}}

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
	@toastr_css
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="{{url('/')}}">
          			<i class="align-middle" data-feather="box"></i>
          			<span class="align-middle"> CARS</span>
        		</a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Admin Panel
                    </li>
                    <li class="sidebar-item {{Request::is('admin/dashboard')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.dashboard.index')}}">
							<i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					{{-- <li class="sidebar-item">
						<a href="{{url('#users')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
						</a>
						<ul id="users" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.index')}}">All User</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.actives')}}">Active User</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.pendings')}}">Pending User</a></li>
						</ul>
					</li> --}}
					<li class="sidebar-item {{Request::is('admin/category')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.category.index')}}">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Category</span>
						</a>
					</li>
					<li class="sidebar-item {{Request::is('admin/car_model')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.car_model.index')}}">
							<i class="align-middle" data-feather="shuffle"></i> <span class="align-middle">Car Model</span>
						</a>
					</li>
					<li class="sidebar-item {{Request::is('admin/country')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.country.index')}}">
							<i class="align-middle" data-feather="flag"></i> <span class="align-middle">Country</span>
						</a>
					</li>
					<li class="sidebar-item {{Request::is('admin/type')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.type.index')}}">
							<i class="align-middle" data-feather="slack"></i> <span class="align-middle">Car Type</span>
						</a>
					</li>
					<li class="sidebar-item {{Request::is('admin/car/*')?'active':''}}">
						<a href="{{url('#cars')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="aperture"></i> <span class="align-middle">Cars</span>
						</a>
						<ul id="cars" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/car')?'active':''}}"><a class="sidebar-link" href="{{route('admin.car.index')}}">All Car</a></li>
							<li class="sidebar-item {{Request::is('admin/car/create')?'active':''}}"><a class="sidebar-link" href="{{route('admin.car.create')}}">Create Car</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/testimonial/*') || Request::is('admin/setting') || Request::is('admin/bank_details') || Request::is('admin/faq') ?'active':''}}">
						<a href="{{url('#setting')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Website Setting</span>
						</a>
						<ul id="setting" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/setting')?'active':''}}"><a class="sidebar-link" href="{{route('admin.setting.index')}}">General Setting</a></li>
							<li class="sidebar-item {{Request::is('admin/testimonial')?'active':''}}"><a class="sidebar-link" href="{{route('admin.testimonial.index')}}">Testimonial</a></li>
							<li class="sidebar-item {{Request::is('admin/bank_details')?'active':''}}"><a class="sidebar-link" href="{{route('admin.bank_details.index')}}">Bank Details</a></li>
							<li class="sidebar-item {{Request::is('admin/faq')?'active':''}}"><a class="sidebar-link" href="{{route('admin.faq.index')}}">FAQ's</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/blog_category/*') || Request::is('admin/blog')  ?'active':''}}">
						<a href="{{url('#blogCategory')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Blogs</span>
						</a>
						<ul id="blogCategory" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/blog_category')?'active':''}}"><a class="sidebar-link" href="{{route('admin.blog_category.index')}}">Manage Category</a></li>
							<li class="sidebar-item {{Request::is('admin/blog')?'active':''}}"><a class="sidebar-link" href="{{route('admin.blog.index')}}">Manage</a></li>
							<li class="sidebar-item {{Request::is('admin/blog/create')?'active':''}}"><a class="sidebar-link" href="{{route('admin.blog.create')}}">Create</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/messages/*') ?'active':''}}">
						<a href="{{url('#messages')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="mail"></i> <span class="align-middle">Messages</span>
						</a>
						<ul id="messages" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/messages/new')?'active':''}}"><a class="sidebar-link" href="{{route('admin.messages.unread')}}">New</a></li>
							<li class="sidebar-item {{Request::is('admin/messages')?'active':''}}"><a class="sidebar-link" href="{{route('admin.messages.index')}}">All</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/profile')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.profile.index')}}">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Profile</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{url('/')}}">
							<i class="align-middle" data-feather="globe"></i> <span class="align-middle">Car Frontend</span>
						</a>
					</li>
				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="{{asset('img\avatars\avatar.jpg')}}" alt="Chris Wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1"> CAR</h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
				<a class="sidebar-toggle d-flex mr-2">
          			<i class="hamburger align-self-center"></i>
       			</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-circle"></i>
									<span class="indicator">{{App\Models\Message::unread()->count()}}</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										{{App\Models\Message::unread()->count()}} New Messages
									</div>
								</div>
								<div class="list-group">
									@foreach(App\Models\Message::unread()->take(5) as $message )
									<a href="{{route('admin.messages.show',$message->id)}}" class="list-group-item">
										<div class="row no-gutters align-items-center">
											{{-- <div class="col-2">
												<img src="img\avatars\avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Stacie Hall">
											</div> --}}
											<div class="col-12 pl-2">
												<div class="text-dark">{{$message->name}}</div>
												<div class="text-muted small mt-1">{{$message->subject}}</div>
												{{-- <div class="text-muted small mt-1">4h ago</div> --}}
											</div>
										</div>
									</a>
									@endforeach
								</div>
								<div class="dropdown-menu-footer">
									<a href="{{route('admin.messages.unread')}}" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
						

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="{{url('#')}}" data-toggle="dropdown">
                <img src="{{asset('img\avatars\avatar.jpg')}}" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood"> <span class="text-dark">Admin</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{route('admin.logout')}}">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					@yield('contents')
				
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							{{-- <ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Terms of Service</a>
								</li>
							</ul> --}}
						</div>
						<div class="col-6 text-right">
							<p class="mb-0">
								&copy; 2021 - <a href="tel:03030672683" class="text-muted">DEVELOPED BY AS</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('js\app.js')}}"></script>
	@toastr_js
	@toastr_render
	@yield('scripts')
</body>

</html>