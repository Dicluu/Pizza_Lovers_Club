<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" }}>

</head>
@extends('templates.main')
@section('content')

    <main class="form-signin w-100 m-auto">
        <form action="{{ route('user.registration') }}" method="POST">
            @csrf
            <div class="center me-3">
                <img class="mb-4" src=" {{ asset('img/logo.png') }}" alt="" width="72"
                     height="57">
            </div>
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating">
                <input name="name" type="name" class="form-control" id="floatingName" placeholder="Alex">
                <label for="floatingName">Name</label>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                <label for="floatingEmail">Email address</label>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary w-100 py-2 mt-5" type="submit">Sign up</button>
        </form>
    </main>

@endsection
</html>
