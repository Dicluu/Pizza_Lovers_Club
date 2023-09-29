<!doctype html>
<html lang="en">
<?php
use App\Models\Item;
use App\Models\PurchaseOrderTask;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">PLC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->can('viewAny', Item::class))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Management
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('item.index') }}">items list</a></li>
                                <li><a class="dropdown-item" href="{{ route('ingredient.index') }}">ingredients list</a>
                                <li><a class="dropdown-item" href="{{ route('user.index') }}">users list</a>
                                <li><a class="dropdown-item" href="{{ route('task.index') }}">task list</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('viewAny', PurchaseOrderTask::class))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Tasks
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('task.list') }}">task list</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                @if(Auth::check())
                    <a href=" {{ route('cart.index') }}" class="btn me-3 nav-btn"><i class="bi bi-cart4"></i></a>
                    <a href="{{ route('user.logout') }}" class="btn nav-btn"><i class="bi bi-door-closed"></i></a>
                @else
                    <a href="{{ route('user.login') }}" class="btn me-3">Sign in</a>
                    <a href="{{ route('user.registration') }}" class="btn me-3">Sign up</a>
                @endif
            </form>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
