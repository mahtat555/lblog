@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Used to create a new post --}}
                    <a class="btn btn-success" href="{{ route("posts.create") }}">
                        Create Post
                    </a>

                    {{-- User posts list --}}
                    <hr>
                    <h3> {{ __("Your Blog Posts :") }} </h3>

                    @if (count($posts) > 0)
                        <table class="table table-striped">
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <h4><a href="{{ route("posts.show", ["post" => $post->id]) }}">
                                        {{ $post->title }}
                                    </a></h4>

                                    <small> Written on {{ $post->created_at }} </small> |
                                    <small> Modified on {{ $post->updated_at }} </small>

                                    {{-- Delete the post --}}
                                    {{ Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',
                                        $post->id], 'method' => 'POST', 'class' => "pull-right"]) }}

                                        {{-- Changing HTTP method from `POST` to `DELETE` --}}
                                        {{ Form::hidden('_method', "DELETE") }}

                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {{ Form::close() }}

                                    {{-- Editing a post --}}
                                    <a style="margin-right: 5px" class="btn btn-primary btn-sm pull-right" href="{{ route("posts.edit", $post->id) }}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    @else
                        <div class="alert alert-light" role="alert">
                            {{ __("You have no posts yet") }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
