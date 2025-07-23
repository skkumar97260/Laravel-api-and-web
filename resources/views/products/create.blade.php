@extends('layout')

@section('content')
<h3>Add Product</h3>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label>Name: <input name="name" required></label><br>
    <label>Price: <input name="price" type="number" required></label><br>
    <label>Description: <input name="description" required></label><br>
    <button type="submit">Add</button>
</form>
@endsection
