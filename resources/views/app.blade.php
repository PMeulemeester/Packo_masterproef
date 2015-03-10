<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{Lang::get('messages.packo')}}</title>

	{{HTML::style('css/app.css')}}
	@yield('css')

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">{{Lang::get('messages.toggle')}}</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">{{Lang::get('messages.packo')}}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{URL::route("home")}}">{{Lang::get('messages.home')}}</a></li>
					<li><a href="{{URL::to(App::getLocale()."/upload")}}">Upload</a> </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{URL::to(App::getLocale()."/auth/login")}}">{{Lang::get('messages.login')}}</a></li>
					@else
						@if(\App\Permissions::checkPermission("Register")=="true")
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get("messages.register") }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									@foreach(\App\Roles::all() as $role)
										@if(\App\Permissions::checkPermission(ucfirst($role->role)." Create"))
											<li><a href="{{URL::to(App::getLocale()."/register/".$role->role)}}">{{Lang::get("register.".$role->role)}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
						@endif
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{URL::to(App::getLocale()."/auth/logout")}}">{{Lang::get('messages.logout')}}</a></li>
							</ul>
						</li>
					@endif
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get("languages.".App::getLocale()) }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							@foreach (\App\Talen::all() as $taal)
								@if(App::getLocale()!=$taal->taal)
									<li><a href="{{URL::to($taal->taal.substr(Request::url(),strrpos(Request::url(),App::getLocale(),0)+2))}}">{{Lang::get("languages.".$taal->taal)}}</a></li>
								@endif
							@endforeach
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
	{{HTML::script('js/modernizr.custom.js')}}
	@yield('scripts')
</body>
</html>
