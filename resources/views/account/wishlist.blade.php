<!-- resources/views/account/wishlist.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Wishlist</h1>
    <ul>
       
        @foreach($wishlist as $item)
             <div class="products">
            <div class="product">
                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{$item->product->name }}" width="150px" height="100px">
                <h3><a href="{{ url('/shop/' . $item->product->id) }}">{{ $item->product->name }}</a></h3>
                <p class="original-price">₹{{ $item->product->mrp }}</p>
                <p class="sale-price">₹ {{$item->product->price }}</p>
            </div>
       </div>
        @endforeach
    </ul>
    <a href="{{ route('account.index') }}">Back to Account</a>
</div>
@endsection
