@extends("layouts.app")

@section('content')

    {{-- Go to Blog page --}}
    <a class="btn btn-secondary" href="{{ route("posts.index") }}">
        <i class="fa fa-chevron-left fa-1x" aria-hidden="true"></i> Go Back
    </a>

    <hr>

    {{-- Post Title --}}
    <h1> {{ $post->title }} </h1>

    {{-- Cover Image --}}
    <div class="col-md-6 col-sm-6">
        <img style="width:100%" src="/storage/cover_images/{{ $post->cover_image }}" />
    </div>
    <hr>

    {{-- Post Body --}}
    <div> {!! $post->body !!} </div>

    {{-- Timestamps --}}
    <hr>
    <small> Written on {{ $post->created_at }} </small> |
    <small> Modified on {{ $post->updated_at }} </small> |
    <small> By <a href="#"> {{ $post->user->name }} </a></small>

    @auth
        @if(Auth::user()->id === $post->user_id)
            <hr>
            {{-- Editing a post --}}
            <a class="btn btn-primary" href="{{ route("posts.edit", $post->id) }}">
                Edit
            </a>

            {{-- Delete the post --}}
            {{ Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',
                $post->id], 'method' => 'POST', 'class' => "pull-right"]) }}

                {{-- Changing HTTP method from `POST` to `DELETE` --}}
                {{ Form::hidden('_method', "DELETE") }}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {{ Form::close() }}
        @endif
    @endauth

@endsection
