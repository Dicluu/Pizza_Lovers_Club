@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div>

        <table class="table table-dark table-hover ">
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">ingredients</th>
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col">delete</th>
            </tr>
            @foreach($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza->id }}</td>
                    <td><a href="{{ route('pizza.show', $pizza->id) }}">{{ $pizza->title }}</a></td>
                    <td>{{ $pizza->description }}</td>
                    <td>{{ $pizza->ingredients }}</td>
                    <td>{{ $pizza->image }}</td>
                    <td>{{ $pizza->price }}</td>
                    <td>
                        <form action="{{ route('pizza.destroy', $pizza->id)  }}" method="POST">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-primary">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            <a class="btn btn-success" href="{{route('pizza.create')}}">Create a new pizza</a>
        </div>

        <div>
            <a class="btn btn-success mt-3" href="{{route('index')}}">Main page</a>
        </div>

    </div>

@endsection
