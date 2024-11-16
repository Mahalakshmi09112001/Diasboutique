@extends('layouts.admin')

@section('content')
<h1>Product List</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
