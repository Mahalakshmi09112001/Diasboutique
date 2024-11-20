@extends('layouts.app')

@section('title', 'Product')

@section('content')
   




<!-- content -->
<section class="py-5">
  <div class="container">
    
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('storage/' . $product->image) }}" />
          </a>
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
           {{ $product->name }}
          </h4>
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
            {{-- <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span> --}}
            <span class="text-success ms-2">In Stock :{{ $product->stock }}</span>
          </div>

          <div class="mb-3">
          <span class="original-price">Category : {{ $product->category->name }}</span><br>
            <p class="text-muted">₹ : <s>{{ $product->mrp }}</s></p>
             <p class="h4 sale-price text-success">Rs : <b>{{ $product->price }}</b> /-</p>
            {{-- <span class="text-muted">/per box</span> --}}
          </div>

          <p>
            {{ $product->description }}
          </p>
          <hr />

          
            <!-- col.// -->
            
          <a href="{{ url('/checkout') }}" class="btn btn-dark shadow-0"> Buy now </a>

            <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1"> <!-- Default quantity is 1 -->
                <button type="submit" class="btn btn-dark shadow-0">
                    <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                </button>
            </form>

            <form action="{{ route('wishlist.store') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-light border border-secondary py-2 icon-hover px-3">
                    <i class="me-1 fa fa-heart fa-lg"></i> Save
                </button>
            </form>

        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
        <div class="px-0 ">
          <div class="card">
          <h5 class="card-title">Similar items</h5>
            <div class="card-body d-flex mb-3">
          @foreach($similarProducts as $similarProduct)

                <div class="">
                  
                    <a href="{{ url('/shop/' . $similarProduct->id) }}" class="me-3">
                        <img src="{{ asset('storage/' . $similarProduct->image) }}" 
                            style="min-width: 96px; height: 96px;" 
                            class="img-md img-thumbnail" />
                    </a>
                    <div class="info">
                        <a href="{{ url('/shop/' . $similarProduct->id) }}" class="nav-link mb-1">
                            {{ $similarProduct->name }}
                        </a>
                        <strong class="text-dark">Rs: {{ $similarProduct->price }}</strong>
                    </div>
                </div>
                @endforeach
            
              </div>

            </div>
          </div>
      </div>
        </div>
      </div>
     
    </div>
  </div>
</section>
@endsection
