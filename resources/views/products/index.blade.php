@extends('layout')

@section('content')
    <h2>Product List</h2>
    <a href="{{ route('products.create') }}">+ Add Product</a>
    @if(session('success')) <p style="color:green;">{{ session('success') }}</p> @endif

    <table>
        <thead><tr><th>Name</th><th>Price</th><th>Description</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
