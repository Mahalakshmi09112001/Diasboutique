@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Confirmation</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Total Price:</strong> Rs {{ $order->total_price }}</p>
    <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>

    <h3>Order Items</h3>
    <ul class="list-group">
        @foreach($order->items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->product->name }} (x{{ $item->quantity }})
                <span>Rs {{ $item->price * $item->quantity }}</span>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3">Back to Shop</a>
</div>
@endsection
