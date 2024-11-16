<!-- account/orders.blade.php -->
<!-- resources/views/account/orders.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Orders</h1>
    <ul>
        @foreach($orders as $order)
            <li>Order #{{ $order->id }} - Status: {{ $order->status }}</li>
        @endforeach
    </ul>
    <a href="{{ route('account.index') }}">Back to Account</a>
</div>
@endsection
