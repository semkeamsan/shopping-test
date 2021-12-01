<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/@fontawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" type="text/css">
    @stack('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container">
                <a class="navbar-brand d-block" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0 ">
                        <li class="nav-item text-nowrap dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" id="navbar-languages">
                                <span>
                                    <img src="{{ asset('images/flags/' . app()->getLocale() . '.svg') }}"
                                        width="26" />
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-languages">
                                @foreach (config('languages', []) as $lang)
                                    <li>
                                        <a class="dropdown-item {{  $lang['code'] == app()->getLocale()? 'active' : null }}" href="{{ route('language.set', $lang['code']) }}">
                                            <span><img width="26"
                                                    src="{{ asset('images/flags/' . $lang['code'] . '.svg') }}" /></span>
                                            <span>{{ $lang['name'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item {{ request()->is('login') ? 'd-none' : null }}">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item {{ request()->is('register') ? 'd-none' : null }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fal fa-tv"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                    <div class="dropdown-divider"></div>

                                    {!! Form::open(['url' => route('logout')]) !!}
                                    <button type="submit" class="dropdown-item">
                                        <i class="fal fa-sign-out-alt"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Core -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Custom Scripts --}}
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- custom --}}
    @stack('scripts')
</body>

</html>
