<!-- resources/views/account/settings.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Account Settings</h1>
    <form action="{{ route('account.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        <!-- You can add form fields for updating settings, like password, email, etc. -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
    <a href="{{ route('account.index') }}">Back to Account</a>
</div>
@endsection
