@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div>


        <table class="table table-dark table-hover ">
            <tr>
                <th scope="col">order</th>
                <th scope="col">employee</th>
                <th scope="col">current status</th>
                <th scope="col">started at</th>
                <th scope="col">ended at</th>
                <th scope="col">task</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            @foreach($tasks as $task)
                <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <tr>
                        <td>{{ $task->order->id }}</td>
                        @if($task->employee)
                            <td><a href="{{ route('user.show', $task->employee->id) }}">{{ $task->employee->name }}</a>
                            </td>
                        @else
                            <td>
                                <select name="employee_id" class="form-control" id="employee" style="max-width: 200px">
                                    @if($task->order->status->id === 2)
                                        @foreach($employees['cookers'] as $employee)
                                            <option
                                                value="{{$employee->id}}">{{ $employee->name }}</option>
                                        @endforeach
                                    @endif
                                    @if($task->order->status->id === 4)
                                        @foreach($employees['couriers'] as $employee)
                                            <option
                                                value="{{$employee->id}}">{{ $employee->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                </select>
                            </td>
                        @endif
                        <td>{{ $task->order->status->title }} ( {{ $task->order->status->id }} )</td>
                        <td>{{ $task->started_at }}</td>
                        <td>{{ $task->ended_at }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if($task->order->status->id == 2 || $task->order->status->id == 4)
                                <input type="hidden" name="status_id" value=" {{ $task->order->status->id + 1}}">
                                <button type="submit" class="btn btn-primary">appoint</button>
                            @else
                                <input type="hidden" name="status_id" value=" {{ $task->order->status->id + 1}}">
                                <input type="hidden" name="employee_id" value=" {{ $task->employee_id}}">
                                <button type="submit" class="btn btn-success">push</button>
                            @endif
                        </td>
                        <td><a type="button" class="btn btn-info" href="{{ route('task.details', $task->id) }}">Details</a></td>
                    </tr>
                </form>
            @endforeach
        </table>
    </div>

@endsection
