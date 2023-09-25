@extends('templates.main')
@section('content')


    <head>
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}" }}>
    </head>

    <div class="container">
        <div class="row">
            @foreach($order->items as $item)
                <div class="col-lg-3 mb-3 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src=" {{ asset('img/items/' . $item->item->image) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item->title }}</h5>
                            <p class="card-text"> {{ $item->item->description }}</p>
                            <div class="product-bottom-details d-flex justify-content-between">
                                <p class="product-price"> {{ ($item->item->price * $item->count) }}₽</p>
                                <div class="d-flex justify-content-between" >
                                <form action="{{ route('purchase.destroy', $item->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id = "btn-cart" class="btn btn-danger btn-count"><i class="bi bi-trash"></i></button>
                                </form>
                                <form action="{{ route('purchase.update') }}" method="POST" >
                                    @method('patch')
                                    @csrf
                                    <input class="btn btn-primary btn-count" name="action" type="submit" value="+">
                                    <input class="window-count" name="action" type="submit" value="{{ $item->count }}">
                                    <input class="btn btn-primary btn-count" name="action" type="submit" value="-">
                                    <input name="item" type="hidden" value="{{ $item->id }}">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p>Итого: {{ $amount }}</p>
        <a class="btn btn-success" href="#">Оплатить</a>
    </div>


@endsection
