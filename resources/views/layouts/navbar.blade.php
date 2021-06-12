<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container">

        {{-- Project name --}}
        <a class="navbar-brand" href="{{ route("home") }}"> {{ config('app.name', 'LBlog') }} </a>

        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbar">
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
                    <a class="nav-link" href="#"> Blog </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
