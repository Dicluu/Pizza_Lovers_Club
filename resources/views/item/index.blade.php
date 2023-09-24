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
                <th scope="col">category</th>
                <th scope="col">delete</th>
            </tr>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ route('item.show', $item->id) }}">{{ $item->title }}</a></td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->ingredients }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->title }}</td>
                    <td>
                        <form action="{{ route('item.destroy', $item->id)  }}" method="POST">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-primary">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            <a class="btn btn-success" href="{{route('item.create')}}">Create a new item</a>
        </div>

        <div>
            <a class="btn btn-success mt-3" href="{{route('index')}}">Main page</a>
        </div>

    </div>

@endsection
