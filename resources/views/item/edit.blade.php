@extends('templates.main')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    </head>
    <div>
        <div class="container mt-5">
        <form action="{{ route('item.update', $item->id) }}" method="POST">
            @csrf
            @method('patch')

            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" value="{{ $item->title }}">
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" name="description" class="form-control"
                              id="description">{{ $item->description }}</textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="text" name="image" class="form-control" id="image" value="{{ $item->image }}">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="price" value="{{ $item->price }}">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control" id="category">
                        @foreach($categories as $category)
                            <option
                                {{ $category->id === $item->category ? ' selected' : '' }}
                                value="{{$category->id}}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
        <a class="btn btn-primary mt-3" href="{{route('item.show', $item->id)}}">Back</a>
        </div>
    </div>
@endsection
