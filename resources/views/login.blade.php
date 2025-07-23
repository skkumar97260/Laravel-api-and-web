@extends('layout')

@section('content')
<h3>Login</h3>
<form action="{{ route('login.submit') }}" method="POST">
    @csrf
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
</form>
<a href="{{ route('signup') }}">Signup</a>
@endsection
