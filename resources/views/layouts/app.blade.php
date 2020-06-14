<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pizza delivery business ') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Pizza delivery business') }}
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
                    <li class="nav-item">
                        <a href="{{route('order.history')}}" class="nav-link p-0 mr-3">
                            <i class="fa fa-history text-success fa-2x"></i>
                            History
                        </a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link p-0 m-0" href="#" id="cart">
                            <i class="fas fa-cart-arrow-down text-success fa-2x"></i>
                            <div class="badge badge-danger" id="item_count">
                                {{Cart::getContent()->count()}}
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @include('templates.shopping_cart')

    {{-- display success message --}}
    @if(session()->has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{session('message')}}
        </div>
    @endif

    {{-- display error message --}}

    @if(session()->has('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{session('error')}}
        </div>
    @endif

    <main class="py-4 container">
        @yield('content')
    </main>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
