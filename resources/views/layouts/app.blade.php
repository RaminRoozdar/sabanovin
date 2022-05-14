<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="@lang('platform.direction')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title'){{ config('platform.name', 'صبانوین') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet">
</head>
<body dir="rtl">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand mr-2" href="{{ url('/') }}">
                    {{ config('platform.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item mr-3 mt-2">
                               <small>
                               <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    امروز {{ \Morilog\Jalali\Jalalian::forge('now')->format('l j %B Y')  }}
                                </small>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <small> {{ Auth::user()->name }} </small>
                                   <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <small><a class="dropdown-item" href="#"> <i class="fa fa-key"></i> تغییر رمز عبور  </a></small>
                                    <small><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user-circle"></i> پروفایل من</a></small>
                                    <small>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                         <i class="fa fa-sign-out"></i>
                                         خروج
                                     </a>
                                    </small>

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    @yield('js')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
      <script>
        iziToast.settings({
        rtl: true,
        zindex: 99999999999,
        position: 'bottomLeft',
        });
        if('{{ Session::has('message') }}') {
        iziToast['{{ Session::get('color') }}']({message:'{{ Session::get('message') }}'});
        }
        '@if(!$errors->isEmpty())'
        '@foreach ($errors->all() as $error)'
        iziToast['error']({message:'{{ $error }}'});
        '@endforeach'
        '@endif'
      </script>
</body>
</html>
