@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div>

        <table class="table table-dark table-hover ">
            <tr>
                <th scope="col">order</th>
                <th scope="col">address</th>
                <th scope="col">phone number</th>
                <th scope="col">email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->order->id }}</td>
                    <td>
                        {{ $task->order->details->city }},
                        {{ $task->order->details->street}},
                        {{ $task->order->details->porch_number}} подъезд,
                        {{ $task->order->details->floor}} этаж, 
                    </td>
                    <td>{{ $task->order->details->phone_number }}</td>
                    <td>{{ $task->order->details->email }}</td>
                    <td>
                        <form action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status_id" value=" {{ $task->order->status->id + 1}}">
                            <input type="hidden" name="employee_id" value=" {{ auth()->user()->id }}">
                            @if($task->employee)
                                @if($task->employee->id !== auth()->user()->id)
                                    <button type="button" class="btn btn-danger">occupied</button>
                                @elseif($task->order->status->id === 5)
                                    <button type="submit" class="btn btn-warning">notify</button>
                                @elseif($task->order->status->id === 6)
                                    <button type="submit" class="btn btn-success">confirm</button>
                                @endif
                            @else
                                <button type="submit" class="btn btn-primary">pick up</button>
                            @endif

                        </form>
                    </td>
                    <td><a type="button" class="btn btn-info" href="{{ route('task.details', $task->id) }}">Details</a></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
