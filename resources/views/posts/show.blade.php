@extends("layouts.app")

@section('content')

    {{-- Go to Blog page --}}
    <a class="btn btn-dark" href="{{ route("posts.index") }}"> Go Back </a>
    <hr>

    <h1> {{$post->title}} </h1>

    <div> {{$post->body}} </div>

    <hr>
    <small>
        Written on {{$post->created_at}} | Modified on {{$post->updated_at}}
    </small>

@endsection
