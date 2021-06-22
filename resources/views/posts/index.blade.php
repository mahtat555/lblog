@extends("layouts.app")

@section('content')
    <h1> Posts </h1>
    <hr>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="well">
                <div class="row">
                    {{-- Cover Image --}}
                    <div class="col-md-2 col-sm-2">
                        <img style="width:100%" src="/storage/cover_images/{{ $post->cover_image }}" />
                    </div>

                    <div class="col-md-8 col-sm-8">
                        {{-- Post Title --}}
                        <h3>
                            <a href="{{route("posts.show", ["post" => $post->id])}}">
                                {{$post->title }}
                            </a>
                        </h3>

                        {{-- Description --}}
                        <p class="font-weight-light font-italic text-secondary">
                           # {{$post->description }}
                        </p>
                    </div >
                </div>
                <small>
                    Written on {{ $post->created_at }} |
                    Modified on {{ $post->updated_at }} |
                    By <a href="#"> {{ $post->user->name }} </a>
                </small>
            </div>
            <hr>
        @endforeach

        {{$posts->links("pagination::bootstrap-4")}}

    @else
        <p> No posts yet </p>
    @endif
@endsection
