@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Your Orders</h1>

    @foreach($orders as $order)
    <div class="card shadow-0 border mb-4">
        <div class="card-body">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-2">
                    <a href="{{ route('product.show', $order->product->id) }}">
                        <img src="{{ $order->product->image_url ?? 'default_image.jpg' }}" 
                             class="img-fluid" 
                             alt="{{ $order->product->name }}">
                    </a>
                </div>

                <!-- Product Name -->
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <a href="{{ route('product.show', $order->product->id) }}">
                        <p class="text-muted mb-0">{{ $order->product->name }}</p>
                    </a>
                </div>

                <!-- Product Details -->
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">{{ $order->product->color ?? 'N/A' }}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: {{ $order->quantity }}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Price: ${{ $order->product->price }}</p>
                </div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Total: ${{ $order->total_price }}</p>
                </div>
            </div>

            <!-- Order Status -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="text-muted mb-0">
                        <strong>Status:</strong> {{ ucfirst($order->status) }}
                    </p>
                    <p class="text-muted mb-0">
                        <strong>Order Placed On:</strong> {{ $order->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <a href="{{ route('account.index') }}" class="btn btn-primary mt-4">Back to Account</a>
</div>
@endsection
