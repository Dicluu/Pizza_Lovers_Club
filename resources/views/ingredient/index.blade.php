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
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col">weight</th>
                <th scope="col">delete</th>
            </tr>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->id }}</td>
                    <td><a href="{{ route('ingredient.show', $ingredient->id) }}">{{ $ingredient->title }}</a></td>
                    <td>{{ $ingredient->description }}</td>
                    <td>{{ $ingredient->image }}</td>
                    <td>{{ $ingredient->price }}</td>
                    <td>{{ $ingredient->weight }}</td>
                    <td>
                        <form action="{{ route('ingredient.destroy', $ingredient->id)  }}" method="POST">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-primary">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            <a class="btn btn-success" href="{{route('ingredient.create')}}">Add new ingredient</a>
        </div>

        <div>
            <a class="btn btn-success mt-3" href="{{route('index')}}">Main page</a>
        </div>

    </div>

@endsection
