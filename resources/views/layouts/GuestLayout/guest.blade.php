<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon icon -->
    <link href="" rel="icon" class="udom-favicon-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UDOM | eClassroom') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('fontAwesome/css/all.css')}}">

    <!-- jquery cdn link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container justify-content-center">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <div class="text-primary navlogo">
                        <img src="{{asset('images/udom.png')}}" alt="" srcset="" class="udomLogo">
                        <p class="navText"> {{ config('app.name', 'eClassroom') }}</p>

                    </div>

                </a>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto ">
                    <!-- Authentication Links -->
                    @guest
                    <div class="home-help-container">
                        <a href="{{asset('/')}}" class="text-decoration-none home-link  "><i class="fas fa-home px-1"></i>home</a>
                        <a href="{{asset('help')}}" class="text-decoration-none help-link "><b><i class="fas fa-question px-1"></i></b>help</a>
                    </div>


                    <div class="login-register-container">
                        @if (Route::has('login'))
                        <li class="nav-item px-2">

                            <a class="nav-link bg-primary rounded text-light login-nav-link" href="{{ route('login') }}"><strong><i class="fas fa-sign-in px-1"></i>{{ __('Login') }}</strong></a>
                        </li>
                        @endif

                        @if (Route::has('register'))

                        <li class="nav-item">
                            <a class="nav-link bg-primary rounded text-light register-nav-link" href="{{ route('register') }}"><strong><i class="fas fa-user-plus px-1"></i>{{ __('Register') }}</strong></a>
                        </li>
                        @endif
                    </div>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->email }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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


    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>