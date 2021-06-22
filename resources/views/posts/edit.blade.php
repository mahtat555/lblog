@extends("layouts.app")

@section('content')
    <h1> Edit Post </h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',
        $post->id], 'method' => 'POST', "enctype" => "multipart/form-data"]) !!}

        {{-- Post Title --}}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control',
                'placeholder' => 'Title']) !!}
        </div>

        {{-- Post Description --}}
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', $post->description, ['class' => 'form-control',
                'placeholder' => 'Description ...']) !!}
        </div>

        {{-- Post Body --}}
        <div class="form-group">
            {!! Form::label('editor', 'Body') !!}
            {!! Form::textarea('body', $post->body, ['class' => 'form-control',
                'id' => 'editor', 'placeholder' => 'Body ...']) !!}
        </div>

        {{-- Cover Image --}}
        <div class="form-group">
            {!! Form::file('cover_image') !!}
        </div>

        {{-- Changing HTTP method from `POST` to `PUT` --}}
        {{ Form::hidden('_method', "PUT") }}

        {{-- Submit --}}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
