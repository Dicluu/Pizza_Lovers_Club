<head>
    <title>Pizza club</title>
</head>
@extends('templates/main')
@section('content')


    <div class="container-sm">
        <div class="row">
            @foreach($items as $item)
                <div class="col-lg-4 col-sm-6 mb-3 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src=" {{ asset('img/items/' . $item->image) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text"> {{ $item->description }}</p>
                            <!-- <a href="#" class="btn btn-primary">ADD TO CART</a> -->
                            <form action="{{ route('purchase.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" id = "btn-cart" class="btn btn-primary"><i class="bi bi-bag"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src=" {{ asset("js/index.js") }}"></script>


@endsection
