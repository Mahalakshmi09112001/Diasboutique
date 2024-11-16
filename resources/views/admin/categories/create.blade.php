<!-- resources/views/admin/categories/create.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container"><h1>Create Category</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Create Category</button>
</form></div>

@endsection
