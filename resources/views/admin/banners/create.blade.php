@extends('layouts.admin')

@section('title', 'Create Banner')

@section('content')
<div class="container my-5">
    <h2>Create New Banner</h2>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Banner Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Banner Image</label>
            <input type="file" id="image" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Banner</button>
    </form>
</div>
@endsection
