<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="img/2.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/LineIcons.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/nivo-lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/main.css')}}">    
    <link rel="stylesheet" href="{{asset('landing/css/responsive.css')}}">
    <style>
        .huruf {
            color: black !important; 
        }


    </style>
</head>
<body>
    <div id="app">
        <header id="home" class="hero-area">    
             <div class="overlay"> {{-- ini background --}}
              <span></span>
              <span></span>
            </div>
            <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
              <div class="container">
                <a href="/" class="navbar-brand"><img src="{{asset('landing/img/logo.png')}}" alt=""></a>       
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                 

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 margin">
            <br><br><br><br><br><br><br><br>
            @yield('content')
        </main>
    </div>
</body>
</html>
