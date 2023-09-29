@extends('templates.main')
@section('content')

    <form action="{{ route('purchase.payment') }}" method="POST">
        @csrf

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3">
                    <label for="city" class="col-sm-2 col-form-label">City:</label>
                    <input type="text" name="city" class="form-control" id="city" value=" {{ old('city') }}">
                    @error('city')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label for="street" class="col-sm-2 col-form-label">Street:</label>
                    <input type="text" name="street" class="form-control" id="street" value=" {{ old('street') }}">
                    @error('street')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-2">
                    <label for="porch_number" class=" col-form-label">Entrance number:</label>
                    <input type="text" name="porch_number" class="form-control" id="porch_number"
                           value=" {{ old('porch_number') }}">
                    @error('porch_number')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-2">
                    <label for="floor" class="col-sm-2 col-form-label">Floor:</label>
                    <input type="text" name="floor" class="form-control" id="floor" value=" {{ old('floor') }}">
                    @error('floor')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-2">
                    <label for="apartment_number" class="col-form-label">Apartment number:</label>
                    <input type="text" name="apartment_number" class="form-control" id="apartment_number" value=" {{ old('apartment_number') }}">
                    @error('apartment_number')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" value=" {{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" value=" {{ old('email') }}">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <label for="phone_number" class="col-form-label">Phone number:</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                           value=" {{ old('phone_number') }}">
                    @error('phone_number')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label for="comment" class="col-form-label">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control"
                              style="height: 100px"> {{ old('comment') }}</textarea>
                </div>
            </div>

            <label for="payment" class="col-form-label">Payment:</label>
            <div class="row" id="payment">
                <div class="col-lg-1">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="payment"
                               class="custom-control-input" value="Cash">
                        <label class="custom-control-label" for="customRadioInline2">Cash</label>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="payment"
                               class="custom-control-input" value="Card" checked>
                        <label class="custom-control-label" for="customRadioInline2">Card</label>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="payment"
                               class="custom-control-input" value="Online">
                        <label class="custom-control-label" for="customRadioInline2">Online</label>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-success">Оформить заказ</button>
                    </div>
                </div>

            </div>
        </div>
    </form>


@endsection
