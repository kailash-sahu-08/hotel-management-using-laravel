@extends('app')

@section('title', 'all hotels')

@section('content')
<div class="container">
  @if($message = Session::get('success'))
        <div class="alert alert-danger text-center" role="alert">
        {{$message}}
</div>
    @endif
  <table class="table">
    <thead>
      <tr>
        <th scope="col">sl. No.</th>
        <th scope="col">Hotel Name</th>
        <th scope="col">Address</th>
        <th scope="col">Description</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($hotels as $hotel)
      <tr>
        <th scope="row">{{$loop->index}}</th>
        <td>{{$hotel->name}}</td>
        <td>{{$hotel->address}}</td>
        <td>{{$hotel->description}}</td>
        <td><a class="btn btn-outline-warning" href="editProduct/{{$hotel->id}}">Edit</a></td>
        <td><a class="btn btn-outline-danger" href="deleteProduct/{{$hotel->id}}">Delete</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection
