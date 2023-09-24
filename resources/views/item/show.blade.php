@extends('templates.main')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>

    <div>
        <img src="{{ asset('img/items/' . $item->image) }}"/>
        <div>{{ $item->id}}. {{ $item->title }} </div>
        <div>{{ $item->description }}</div>
    </div>
    <a class="btn btn-success" href="{{route('item.index')}}">Back</a>
    <a class="btn btn-success" href="{{route('item.edit', $item->id)}}">Edit</a>

@endsection
