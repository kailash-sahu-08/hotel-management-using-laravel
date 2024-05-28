

@extends('app')

@section('title', 'register')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
        {{$message}}
        </div>
    @endif
        <h1>Signup</h1>
        
        @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection

