<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Project Manager' )</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                line-height: 1.7rem;
                margin: 0;
            }

            nav.navbar.navbar-expand-md.navbar-dark.bg-dark.shadow-sm {
                 position: fixed;
            }

            nav{
                width: 100% !important;
            }

            .content ul{
                list-style: none;
            }
            .content li+li {
             margin-top: 0px !important;
            }

            .hidden{
                display: none;
            }

            .navbar-expand-md .navbar-nav .nav-link{
             margin-top: 17px !important;
           }

           div.active a{
               color:#ed213a !important;
           }

           li.active a{
               color:#ed213a !important;
           }
            .content{ 
             padding: 24px;
            width: 75%;
            margin: 0 auto;
            padding-top: 154px;
            color: white;
           }

           .title{
            text-align : center !important;
            color: white;
            text-shadow: 1px 0.5px 1px #0e0f10;
           }

           .content h3 {
             font-size: 1.5em;
             margin-bottom: 0.2em;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .nav-item a{
                color: rgba(0,0,0,.5);
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-md  navbar-dark bg-dark shadow-sm">
            <div class="container">
            <div class="{{ Request::is('/') ? 'active' : '' }}">
                <a class="navbar-brand pt-3 " href="{{ url('/') }}">
                    {{ config('app.name')}}
                </a>
            </div>
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                            <li class="{{ Request::is('projects*') ? 'active' : '' }}" >
                            <a href="/projects" class="nav-link pt-2 pr-3" v-pre>Projects</a>
                            </li>
                            <li class="{{ Request::is('profile') ? 'active' : '' }}" >
                            <a href="/profile" class="nav-link pt-2 pr-3" v-pre>Profile</a>
                            </li>
                            <li class="nav-item">
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

        <div class="">
            <div class="content">
                @yield('content')
            </div>
        </div>
        </body>
</html>
