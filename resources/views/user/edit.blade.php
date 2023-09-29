@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div>
        <div class="container mt-5">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('patch')

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">New name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">New email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">New job post</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role_id">
                        @foreach($roles as $role)
                        <option
                            {{ $role->id === $user->role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
            <a class="btn btn-primary mt-3" href="#" onclick="history.back();">Back</a>
        </div>
    </div>
@endsection
