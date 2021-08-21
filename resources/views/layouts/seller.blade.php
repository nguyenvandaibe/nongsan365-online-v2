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
    <script src="{{ asset('js/layout.js') }}" defer></script>
    <script src="{{ asset('js/libs/jquery.toaster.js') }}" defer></script>

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
    @stack('seller-styles')
</head>

<body>
<div id="app">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-italic main-color" href="{{ url('/') }}"
                   style="font-family: 'Open Sans', sans-serif;">
                    nongsan365
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="text-danger">
                                        <i class="fas fa-power-off"></i>
                                    </span>
                                    {{ __('Đăng xuất') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="d-flex row mx-0">
        <nav id="sellerSideBar" class="nav flex-column col-sm-2 border-right">
            <a class="nav-link text-dark" href="{{route('seller.home')}}">
                <i class="far fa-cubes"></i>
                {{__('Trang chủ')}}
            </a>
            <a class="nav-link text-dark"
               data-toggle="collapse"
               href="#productSubMenu"
               role="button"
               aria-expanded="true"
               aria-controls="productSubMenu"
            >
                <i class="far fa-pumpkin"></i>
                {{ __('Quản lý sản phẩm') }}
            </a>
            <ul class=" nav" id="productSubMenu">
                <li class="nav-item w-100 pl-4">
                    <a href="{{route('seller.products.index')}}" class="nav-link text-dark">
                        {{ __('Nông sản') }}
                    </a>
                    <a href="#" class="nav-link text-dark">
                        {{ __('Sản phẩm bán') }}
                    </a>
                </li>
            </ul>
        </nav>
        <div id="sellerContent" class="bg-white col-sm-10">
            @yield('content')
        </div>
    </main>
</div>

@stack('seller-scripts')

</body>
</html>
