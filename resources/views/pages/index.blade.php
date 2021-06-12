@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1> {{ $title }} </h1>
        <p>
            This is a blog web application - used for the periodic and regular publication of personal articles - it
            implemented with PHP Language using the Laravel framework.
        </p>
        <p>
            <a class="btn btn-primary btn-lg" role="button" href="#login"> Login </a>
            <a class="btn btn-success btn-lg" role="button" href="#register"> Register </a>
        </p>
    </div>
@endsection
