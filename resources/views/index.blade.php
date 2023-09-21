<head>
    <title>Pizza club</title>
</head>
@extends('templates/main')
@section('content')


    <div class="container-sm">
        <div class="row">
            @foreach($pizzas as $pizza)
                <div class="col-lg-4 col-sm-6 mb-3 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src=" {{ asset('img/pizzas/' . $pizza->image) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pizza->title }}</h5>
                            <p class="card-text"> {{ $pizza->description }}</p>
                            <!-- <a href="#" class="btn btn-primary">ADD TO CART</a> -->
                            <button id = "btn-cart" class="btn btn-primary"><i class="bi bi-bag"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src=" {{ asset("js/index.js") }}"></script>


@endsection
