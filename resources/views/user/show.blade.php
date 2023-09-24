@extends('templates.main')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>

    <div>
        <div>{{ $user->id}}. {{ $user->name }} </div>
        <div>{{ $user->email }}</div>
    </div>
    <a class="btn btn-success" href="{{route('user.index')}}">Back</a>
    <a class="btn btn-success" href="{{route('user.edit', $user->id)}}">Edit</a>

@endsection
