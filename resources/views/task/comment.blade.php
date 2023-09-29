@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div class="container">
        <h3>Comment:</h3>
        <h5>{{ $comment }} </h5>
    </div>

@endsection
