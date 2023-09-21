@extends('templates.main')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>

    <div>
        <img src="{{ asset('img/pizzas/' . $pizza->image) }}"/>
        <div>{{ $pizza->id}}. {{ $pizza->title }} </div>
        <div>{{ $pizza->description }}</div>
    </div>
    <a class="btn btn-success" href="{{route('pizza.index')}}">Back</a>
    <a class="btn btn-success" href="{{route('pizza.edit', $pizza->id)}}">Edit</a>

@endsection
