@extends('app')

@section('title', 'all hotels')

@section('content')
  <!-- resources/views/hotels/create.blade.php -->
    <div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
        {{$message}}
        </div>
    @endif
        <form action="{{ route('registerHotel') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Hotel Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Hotel</button>
        </form>
    </div>

@endsection