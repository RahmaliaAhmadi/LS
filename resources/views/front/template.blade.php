<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">	
    <head>
	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ trans('front/site.title') }}</title>
        <meta name="description" content="">    
        <meta name="viewport" content="width=device-width, initial-scale=1">

		   <!-- Bootstrap Core CSS -->
		

		<!-- Custom CSS -->
		<!-- Custom CSS -->
		

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

		
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        @yield('head')
		{!! HTML::style('css/bootstrap.min.css') !!}
        {!! HTML::style('css/front.css') !!}

    </head>


<body>

    <div class="brand">{{ trans('front/site.title') }}</div>
    <div class="address-bar">{{ trans('front/site.sub-title') }}</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">{{ trans('front/site.title') }}A</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li {!! classActivePath('/') !!}>
                            {!! link_to('/', trans('front/site.home')) !!}
                     </li>
					 @if(session('statut') == 'visitor' || session('statut') == 'user')
                            <li {!! classActivePath('contact/create') !!}>
                                {!! link_to('contact/create', trans('front/site.contact')) !!}
                            </li>
                     @endif
					 <li {!! classActiveSegment(1, ['articles', 'blog']) !!}>
                            {!! link_to('articles', trans('front/site.blog')) !!}
								
					</li>
					@if(Request::is('auth/register'))
                            <li class="active">
                                {!! link_to('auth/register', trans('front/site.register')) !!}
                            </li>
                        @elseif(Request::is('password/email'))
                            <li class="active">
                                {!! link_to('password/email', trans('front/site.forget-password')) !!}
                            </li>
                        @else
                            @if(session('statut') == 'visitor')
                                <li {!! classActivePath('login') !!}>
                                    {!! link_to('login', trans('front/site.connection')) !!}
                                </li>
                            @else
                                @if(session('statut') == 'admin')
                                    <li>
                                        {!! link_to_route('admin', trans('front/site.administration')) !!}
                                    </li>
                                @elseif(session('statut') == 'redac') 
                                    <li>
                                        {!! link_to('blog', trans('front/site.redaction')) !!}
                                    </li>
                                @endif
                                <li>
                                    {!! link_to('/logout', trans('front/site.logout'), ['id' => "logout"]) !!}
                                    {!! Form::open(['url' => '/logout', 'id' => 'logout-form']) !!}{!! Form::close() !!}
                                </li>
                            @endif
                        @endif
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><img width="32" height="32" alt="{{ session('locale') }}"  src="{!! asset('img/' . session('locale') . '-flag.png') !!}" />&nbsp; <b class="caret"></b></a>
						<ul class="dropdown-menu">
						@foreach ( config('app.languages') as $user)
							@if($user !== config('app.locale'))
								<li><a href="{!! url('language') !!}/{{ $user }}"><img width="32" height="32" alt="{{ $user }}" src="{!! asset('img/' . $user . '-flag.png') !!}"></a></li>
							@endif
						@endforeach
						</ul>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
@yield('header')  
    <div class="container">

        
	@if(session()->has('ok'))
            @include('partials/error', ['type' => 'success', 'message' => session('ok')])
        @endif  
        @if(isset($info))
            @include('partials/error', ['type' => 'info', 'message' => $info])
        @endif
        @yield('main')
    </div>
    <!-- /.container -->
	<!--
<main class="container">
        
    </main>-->
    <footer>
        <div class="container">
		 @yield('footer')
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
	{!! HTML::script('js/jquery.js') !!}
	{!! HTML::script('js/bootstrap.min.js') !!}
   

    <!-- Script to Activate the Carousel -->
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
