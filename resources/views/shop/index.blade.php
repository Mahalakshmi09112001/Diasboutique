@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <main>
        <section class="sale">
            <h1>Big Sale - Up to 50% Off!</h1>
            <p>Shop our exclusive sale and save big on these amazing products!</p>
       <div class="products">
         @foreach($products as $product)
            <div class="product">
         <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150px" height="100px">
         <h3><a href="{{ url('/shop/' . $product->id) }}">{{ $product->name }}</a></h3>
          <p class="original-price">₹{{ $product->mrp }}</p>
          <p class="sale-price">₹ {{ $product->price }}</p>
          <button class="btn-buy">Buy Now</button>
          <button class="btn-cart" >Add to Cart</button> 
     </div>
        @endforeach
       </div>
        </section>
    </main>
@endsection

