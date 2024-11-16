@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shopping Cart</h1>

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                     <td><img src="{{ asset('storage/' . $item->product->image) }}" 
                            style="min-width: 96px; height: 96px;" 
                            class="img-md img-thumbnail" /></td>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                            </form>
                        </td>
                        <td>Rs: {{ $item->product->price }}</td>
                        <td>Rs: {{ $item->product->price * $item->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="mt-3">
            <strong>Total: Rs: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</strong>
        </p>
    @endif
</div>
@endsection
