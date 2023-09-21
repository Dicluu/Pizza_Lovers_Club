@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>

    <div>
        <img src="{{ asset('img/ingredients/' . $ingredient->image) }}"/>
        <div>{{ $ingredient->id}}. {{ $ingredient->title }} </div>
        <div>{{ $ingredient->description }}</div>
    </div>
    <a class="btn btn-success mt-3" href="{{route('ingredient.index')}}">Back</a>
    <a class="btn btn-success mt-3" href="{{route('ingredient.edit', $ingredient->id)}}">Edit</a>

@endsection
