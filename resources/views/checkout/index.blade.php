@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required>{{ old('shipping_address') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
            </select>
        </div>

        <h3>Order Summary</h3>
        <ul class="list-group mb-3">
            @foreach($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item->product->name }} (x{{ $item->quantity }})
                    <span>Rs: {{ $item->product->price * $item->quantity }}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <strong>Total</strong>
                <span>Rs: {{ $totalPrice }}</span>
            </li>
        </ul>

        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection
