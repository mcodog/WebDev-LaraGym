<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.programs {
    /* border:1px solid red; */
    width:100%;
    height:fit-content;

    display:flex;
    gap:10px;
    padding: 10px;

    flex-direction: column;
    
}

.programs a{
    text-decoration: none;
}

.program-item {
    height: 200px;
    width: 100%;
    /* border:1px solid red; */

    border-radius: 10px;
    display:flex;
    flex-direction: column-reverse;

    padding:10px;
    padding-left:20px;
    color:white;
    
    /* border: 1px solid black; */

    background-color:rgb(13, 13, 13);
}

.program-item div{
    width:100%;
    height:30px;
    text-decoration:none;
    /* border:1px solid blue; */
}

.program-item .program-description{
    color:gray;
}


</style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }} @if (Auth::user()->role == "admin")
                <sub style="color:gray;">Admin</sub>
                @else
                <sub style="color:gray;">Client</sub>
                @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::user()->role == "admin")
                    
                        <ul class="navbar-nav me-auto">
                            <div class="dropdown btn dropdown-toggle">
                                <span>CRUD Manager</span>
                                <div class="dropdown-content dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/employee">Employees</a>
                                    <a class="dropdown-item" href="/client">Clients</a>
                                    <a class="dropdown-item" href="/equipment">Equipments</a>
                                    <a class="dropdown-item" href="/manufacturer">Manufacturer</a>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="/employee">Analytics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/client">Accounts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/client">Training Services</a>
                            </li>
                        </ul>
                    @elseif (Auth::user()->role == "user")
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/employee">Train with Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/coaching">Coaching</a>
                            </li>
                        </ul>
                        
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        @if (Auth::user()->role == "user")
                        <form class="d-flex" method="POST" action="/search">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="queryyy" id="query">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    @stack('scripts')
</body>
</html>
    </div>
</body>
</html>
