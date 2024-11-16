<!-- resources/views/admin/users/edit.blade.php -->

@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <!-- User Type Dropdown -->
    <div class="form-group">
        <label for="user_type">User Type</label>
        <select id="user_type" name="user_type" class="form-control" required>
            <option value="user" {{ old('user_type', $user->user_type) == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('user_type', $user->user_type) == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('user_type')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
</form>

<a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back to Users List</a>
@endsection
