@extends('templates.main')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>

    <table class="table table-dark table-hover ">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                <td>
                    <form action="{{ route('user.destroy', $user->id)  }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
