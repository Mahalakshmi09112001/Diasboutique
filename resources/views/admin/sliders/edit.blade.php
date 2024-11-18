<!-- resources/views/admin/sliders/edit.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Edit Slider</h1>

    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $slider->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $slider->image) }}" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
