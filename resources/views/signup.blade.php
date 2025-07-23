@extends('layout')

@section('content')
<h3>Signup</h3>
<form action="{{ route('signup.submit') }}" method="POST">
    @csrf
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Signup</button>
</form>
<a href="{{ route('login') }}">Login</a>
@endsection
