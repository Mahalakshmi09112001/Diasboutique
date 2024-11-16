<!-- resources/views/admin/products/show.blade.php -->

@extends('layouts.admin')

@section('content')


<div class="container">
 <h1>Product Details</h1>
    <div class="row">
        <div class="col-md-6">
            <h3>Name: {{ $product->name }}</h3>
            <p>Description: {{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <p>Stock: {{ $product->stock }}</p>
            <p>Category: {{ $product->category->name }}</p>
            <p>Created at: {{ $product->created_at }}</p>
            <p>Updated at: {{ $product->updated_at }}</p>
        </div>
    </div>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
</div>
@endsection
