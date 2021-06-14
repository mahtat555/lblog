<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container">

        {{-- Project name --}}
        <a class="navbar-brand" href="{{ route("home") }}"> {{ config('app.name', 'LBlog') }} </a>

        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
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
        </div>

        <ul class="navbar-nav ml-auto">

            {{-- Used to create a new post --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route("posts.create") }}"> Create Post </a>
            </li>
        </ul>
    </div>
</nav>
<br>
