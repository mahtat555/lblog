<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container">

        {{-- Project name --}}
        <a class="navbar-brand" href="{{ route("home") }}">
            {{ config('app.name', 'LBlog') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- Home page --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("home") }}"> Home </a>
                </li>

                {{-- About page --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("about") }}"> About </a>
                </li>

                {{-- Services page --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("services") }}"> Services </a>
                </li>

                {{-- Blog page --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("posts.index") }}"> Blog </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                    {{-- Login to my account --}}
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{-- Create a new account --}}
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    {{-- User Name --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/storage/profile_pictures/{{ Auth::user()->profile_picture }}" width="40" height="40" class="rounded-circle">
                            {{ Auth::user()->name }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            {{-- Dashboard Page --}}
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#settings"/></svg>
                                {{ __('Dashboard') }}
                            </a>

                            {{-- My Profile --}}
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#person"/></svg>
                                {{ __('My Profile') }}
                            </a>

                            {{-- Logout  --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#off"/></svg>
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
<br>
