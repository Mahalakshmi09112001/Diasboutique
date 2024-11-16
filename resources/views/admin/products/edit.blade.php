@extends('layouts.admin')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" id="image" name="image" class="form-control">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" style="max-width: 150px;">
        @endif
        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
        @error('stock')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="mrp">MRP</label>
        <input type="number" step="0.01" id="mrp" name="mrp" class="form-control" value="{{ old('mrp', $product->mrp) }}" required>
        @error('mrp')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="price">Discounted Price</label>
        <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
@endsection
