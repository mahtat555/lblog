@extends("layouts.app")

@section('content')
    <h1> Create Post </h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store',
        'method' => 'POST', "enctype" => "multipart/form-data"]); !!}

        {{-- Post Title --}}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', '', ['class' => 'form-control',
                'placeholder' => 'Title']) !!}
        </div>

        {{-- Post Description --}}
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', '', ['class' => 'form-control',
                'placeholder' => 'Description ...']) !!}
        </div>

        {{-- Post Body --}}
        <div class="form-group">
            {!! Form::label('editor', 'Body') !!}
            {!! Form::textarea('body', '', ['class' => 'form-control',
                'id' => 'editor', 'placeholder' => 'Body ...']) !!}
        </div>

        {{-- Cover Image --}}
        <div class="form-group">
            {!! Form::file('cover_image') !!}
        </div>

        {{-- Submit --}}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
