@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div class="container">
        <h3>Order Details</h3>
        <h5>Name: {{ $details->name }}</h5>
        <h5>Phone number: {{ $details->phone_number }}</h5>
        <h5>Address: {{ $details->city }}, {{ $details->street }}, {{ $details->porch_number }} подъезд, {{ $details->floor }} этаж, квартира/помещение: {{ $details->apartment_number }}</h5>
        <h5>Payment: {{ $details->payment }}</h5>
        <h5>Comment: {{ $details->comment }}</h5>
        <h5>Contains:
        @foreach($order->items as $item)
            {{ $item->item->title }} x {{ $item->count }},
            @endforeach
        </h5>


    </div>


@endsection
