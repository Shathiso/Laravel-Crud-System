<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<style>
nav{
  width: 100% !important;
}

.navbar-expand-md .navbar-nav .nav-link{
    margin-top: 17px !important;
}

.hidden{
    display:none;
}

li.active a{
    color:#ed213a !important;
}

</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                             <li class="{{ Request::is('dashboard') ? 'active' : '' }}" >
                            <a href="/dashboard" class="nav-link pt-2 pr-3" v-pre>Dashboard</a>
                            </li>
                            <li class="{{ Request::is('projects') ? 'active' : '' }}" >
                            <a href="/projects" class="nav-link pt-2 pr-3" v-pre>Projects</a>
                            </li>
                            <li class="{{ Request::is('profile') ? 'active' : '' }}" >
                            <a href="/profile" class="nav-link pt-2 pr-3" v-pre>Profile</a>
                            </li>
                             @inject('profile', 'App\Profile')
                            @inject('user', 'App\User')

                            
                            <!---- Checking if the user has a profile, then displaying their profile image ---->
                            @if(  count( $profile->where('owner_id','=',Auth::user()->id)->get()) != 0 )

                              <div class="hidden">{{ $url = $profile->where('owner_id','=',Auth::user()->id)->get('profile_image_url')[0] }}; </div>

                               
                                <img src="/storage/{{ $url->profile_image_url }}" alt="" class="rounded-circle mt-3 mb-3" style="width: 40px; height: 40px; border: 1px solid #fff;"/>
                            @endif
                            </li>
                            <li class="nav-item dropdown">
                                
     
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
