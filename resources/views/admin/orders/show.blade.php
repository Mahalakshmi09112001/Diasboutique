@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<div class="container mt-5">
    <h1>Order Details</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h4>Order ID: {{ $order->id }}</h4>
            <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
            <p><strong>Order Status:</strong> {{ $order->status }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>

    <h3 class="mt-4">Products in Order</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>
                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                 style="min-width: 96px; height: 96px;" 
                                 class="img-md img-thumbnail" />
                        </td>
                <td>{{ $item->quantity }}</td>
                <td>Rs: {{ $item->product->price }}</td>
                <td>Rs: {{ $item->product->price * $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-3"><strong>Order Total: Rs: {{ $order->orderItems->sum(fn($item) => $item->product->price * $item->quantity) }}</strong></p>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back to Orders</a>
</div>
@endsection
