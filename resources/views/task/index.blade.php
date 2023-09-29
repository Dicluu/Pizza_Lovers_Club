@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div>

        <table class="table table-dark table-hover ">
            <tr>
                <th scope="col">task id</th>
                <th scope="col">order id</th>
                <th scope="col">employee</th>
                <th scope="col">current status</th>
                <th scope="col">started at</th>
                <th scope="col">ended at</th>
                <th scope="col">task</th>
            </tr>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->order->id }}</td>
                    @if($task->employee)
                        <td><a href="{{ route('user.show', $task->employee->id) }}">{{ $task->employee->name }}</a></td>
                    @else
                        <td>no worker</td>
                    @endif
                    <td>{{ $task->order->status->title }} ( {{ $task->order->status->id }} )</td>
                    <td>{{ $task->started_at }}</td>
                    <td>{{ $task->ended_at }}</td>
                    <td>{{ $task->title }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
