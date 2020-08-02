<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Stay Frosty!') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
            <div class="wrap-area">
                <div id="app">
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                            <div class="container">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    {{ config('app.name', 'Stay Frosty!') }}
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">

                                    </ul>

                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                
                                                <div class="my-nav">
                                                    <a href="{{route('home')}}">{{ __('Pagrindinis') }}</a>
                                                    <a href="{{route('home')}}">{{ __('Kategorija') }}</a>
                                                    <a href="{{route('home')}}">{{ __('Sąrašai') }}</a>
                                                    <a href="{{route('home')}}">{{ __('Prideti') }}</a>
                                                    <a href="{{route('home')}}">{{ __('Kita') }}</a>
                                                                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Atsijungti') }}
                                                        
                                                    </a>
                                                    </div>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Atsijungti') }}
                                                        
                                                    </a>
                                                    
                                                   
                                                    

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                   
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <main class="py-4">
                        @yield('content')
                    </main>
            </div>
            <div class="box" style="background: url('slider/pattern.png');"></div>
            <div class="slider">
                <div class="slide s1 active" style="background: url('slider/slider1.jpg'); background-size: 100% 100%;"></div>
                <div class="slide s2" style="background: url('slider/slider2.jpg'); background-size: 100% 100%;"></div>
                <div class="slide s3" style="background: url('slider/slider3.jpg'); background-size: 100% 100%;"></div>
                <div class="slide s4" style="background: url('slider/slider1.jpg'); background-size: 100% 100%;"></div>
            </div>
</body>
</html>
