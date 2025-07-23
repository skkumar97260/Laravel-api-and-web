@extends('layout')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name: <input name="name" value="{{ $product->name }}" required></label><br>
        <label>Price: <input name="price" type="number" value="{{ $product->price }}" step="0.01" required></label><br>
        <label>Description: <textarea name="description">{{ $product->description }}</textarea></label><br>
        <button type="submit">Update</button>
    </form>
@endsection
