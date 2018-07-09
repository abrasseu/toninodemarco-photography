<html lang="en">

<!-- HEAD -->
<head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tonino De Marco</title>


	<!--[if lt IE 9]>
		<script src	="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src	="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- CSS -->
	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('css/admin.min.css') }}

</head>


<body>

	<!-- Header -->
	<nav class="navbar fixed-top navbar-inverse bg-inverse navbar-toggleable-sm" role="navigation">
		<div class="container text-center my-auto">

			<div class="">
				<a class="navbar-brand" href="{{route('admin.index')}}">Tonino De Marco</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu" aria-label="Toggle navigation">
	 				<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon"></span>
	 			</button>
			</div>

			<div id="menu" class="navbar-collapse collapse navbar-right">		
				<ul class="navbar-nav ml-auto">
					
					{{-- Admin Routes --}}
					@foreach($adminRoutes as $route => $name)
					<li class="nav-item">
						<a href="{{route($route)}}" class="nav-link {{ Route::currentRouteName()==$route ? 'active' : ''}}">{{$name}}</a>
					</li>
					@endforeach

					{{-- Public Routes --}}
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Public <b class="caret"></b></a>
						<ul class="dropdown-menu bg-faded" aria-labelledby="navbarDropdownMenuLink">
							@foreach($routes as $route => $name)
							<li><a href="{{route($route)}}" class="dropdown-item {{ Route::currentRouteName()==$route ? 'active' : ''}}">{{$name}}</a></li>
							@endforeach
						</ul>
					</li>

					{{-- Logout --}}
					<li class="nav-item align-middle"><a href="{{route('logout')}}" class="nav-link">Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->

		</div>
	</nav>


	{{-- Debug --}}
	{{-- @include('components.viewport') --}}
	{{-- @component('components.debug'){{ route prefix }}@endcomponent --}}

	{{-- Content --}}
	<main class="container">

		{{-- Feedbacks --}}
		@include('components.feedback')

		{{-- Content --}}
		@yield('content')
	</main>


	<!-- FOOTER -->
	@section('scripts')
		<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		{{ HTML::script('bootstrap/js/bootstrap.min.js')}}
		{{ HTML::script('js/my.js')}}
	@show

</body>
</html>




