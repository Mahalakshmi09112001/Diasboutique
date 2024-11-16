<!-- resources/views/account/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>Your account details</p>
    <ul>
        <li><a href="{{ route('account.orders') }}">My Orders</a></li>
        <li><a href="{{ route('account.wishlist') }}">My Wishlist</a></li>
        <li><a href="{{ route('account.settings') }}">Account Settings</a></li>
    </ul>
</div>
@endsection
