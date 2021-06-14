<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title> {{ config('app.name', 'LBlog') }} </title>

</head>

<body class="antialiased">

    {{-- navbar --}}
    @include("layouts.navbar")

    {{-- Sections --}}
    <div class="container">

        {{-- Errors messages --}}
        @include("layouts.messages")

        @yield('content')
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
