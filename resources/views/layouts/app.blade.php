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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/variable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-sm bg-main-color py-1">
        <div class="container">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="text-uppercase pl-3">
                            <a class="text-white text-decoration-none small"
                               href="{{ route('login') }}">{{ __('Đăng nhập') }}
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="text-uppercase pl-3">
                            <a class="text-white text-decoration-none small"
                               href="{{ route('register') }}">{{ __('Đăng ký') }}
                            </a>
                        </li>
                    @endif
                    @if (Route::has('seller-channel'))
                        <li class="text-uppercase pl-3">
                            <a class="text-white text-decoration-none small"
                               href="{{ route('seller-channel') }}">{{ __('Kênh người bán') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="text-uppercase pl-3">
                        <a class="text-white text-decoration-none small" href="{{route('home')}}">
                            {{ 'TÀI KHOẢN ' . Auth::user()->name }}
                        </a>
                    </li>

                    <li class="text-uppercase pl-3">
                        <a class="text-white text-decoration-none small"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        >
                            <i class="fas fa-power-off"></i>
                            {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-italic main-color" href="{{ url('/') }}"
               style="font-family: 'Open Sans', sans-serif;">
                nongsan365
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>

</html>
