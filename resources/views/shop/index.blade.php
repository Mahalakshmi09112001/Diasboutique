@extends('layouts.app')

@section('title', 'Shop')

@section('content')

<main>
    <!-- Banners Section -->
    <section class="container my-4">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($banners as $index => $banner)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($banners as $index => $banner)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->name }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <!-- Sidebar for Categories -->
            <aside class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5>Categories</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('shop.category', $category->id) }}" class="text-dark">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            <!-- Main Shop Content -->
            <section class="col-md-9">
                @if($products->isEmpty())
                    <div class="alert alert-warning text-center">
                        No products found in this category.
                    </div>
                @else
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                   <div class="view overlay" style="height: 200px; overflow: hidden;">
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                            class="card-img-top w-100 h-100" 
                                            alt="{{ $product->name }}" 
                                            style="background: cover;">
                                    </div>

                                    <div class="card-body text-center">
                                        <h6 class="card-title">
                                            <a href="{{ url('/shop/' . $product->id) }}" class="text-dark">
                                                {{ $product->name }}
                                            </a>
                                        </h6>
                                        <p class="text-muted"><s>₹{{ $product->mrp }}</s></p>
                                        <p class="font-weight-bold text-danger">₹{{ $product->price }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-dark btn-sm">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </form>
                                        <form action="{{ route('wishlist.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-heart"></i> Save
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </div>
</main>

@endsection
