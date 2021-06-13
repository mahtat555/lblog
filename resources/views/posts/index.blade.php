@extends("layouts.app")

@section('content')
    <h1> Posts </h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <h3>
                   <a href="{{route("posts.show", ["post" => $post->id])}}"> {{$post->title}} </a>
                </h3>
                <small>
                    Written on {{$post->created_at}} |
                    Modified on {{$post->updated_at}}
                </small>
            </div>
        @endforeach
        <hr>

        {{$posts->links("pagination::bootstrap-4")}}

    @else
        <p> No posts yet </p>
    @endif
@endsection
