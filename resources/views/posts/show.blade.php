@extends("layouts.app")

@section('content')

    {{-- Go to Blog page --}}
    <a class="btn btn-secondary" href="{{ route("posts.index") }}">
        <i class="fa fa-chevron-left fa-1x" aria-hidden="true"></i> Go Back
    </a>
    <hr>

    {{-- Post Title --}}
    <h1> {{ $post->title }} </h1>

    {{-- Post Body --}}
    <div> {!! $post->body !!} </div>

    {{-- Timestamps --}}
    <hr>
    <small>
        Written on {{$post->created_at}} | Modified on {{$post->updated_at}}
    </small>

    {{--  --}}
    <hr>
    <a class="btn btn-primary" href="{{ route("posts.edit", $post->id) }}">
        Edit
    </a>

@endsection
