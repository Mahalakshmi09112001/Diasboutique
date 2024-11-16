<!-- resources/views/admin/users/show.blade.php -->

@extends('layouts.admin')

@section('content')
<h1>User Details</h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Name: {{ $user->name }}</h3>
            <p>Email: {{ $user->email }}</p>
            <p>Created at: {{ $user->created_at }}</p>
            <p>Updated at: {{ $user->updated_at }}</p>
        </div>
    </div>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back to Users List</a>
</div>
@endsection
