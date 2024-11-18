@extends('layouts.app')

@section('title', 'Edit Banner')

@section('content')
<div class="container my-5">
    <h2>Edit Banner</h2>
    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Banner Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $banner->name) }}" required>
        </div>
        <div class="form-group">
            <label for="image">Banner Image (Leave blank to keep current image)</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Banner</button>
    </form>
</div>
@endsection
