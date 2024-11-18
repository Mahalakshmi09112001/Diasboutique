<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    
    <!-- Responsive Banner -->
    {{-- <section>
        <div class="banner">
            <h1>Special Offer!</h1>
            <p>Get 10% off on all products!</p>
            <button onclick="window.location.href='sale.html'">Shop Now</button>
        </div>
    </section> --}}

    <!-- Carousel Section -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img class="d-block w-100 slideImg" src="{{ asset('storage/' . $slider->image) }}" alt="Slide {{ $index + 1 }}">
                {{-- @if($slider->title || $slider->description)
                    <div class="carousel-caption d-none d-md-block banner">
                        <h1>{{ $slider->title }}</h1>
                        <p>{{ $slider->description }}</p>
                        <button onclick="window.location.href='{{ route('shop.index') }}'">Shop Now</button>
                    </div>
                @endif --}}
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

             {{-- New Arrivals --}}
        <section class="new-arrivals">
           <h1>New Arrivals</h1>
            <div class="products">
                @foreach($newArrivals as $product)
                 <div class="product">
                   <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                   <h3><a href="{{ url('/shop/' . $product->id) }}">{{ $product->name }}</a></h3>
                    <p class="sale-price">Price : {{ $product->price }}</p>
                  </div>
                @endforeach
            </div>
        </section>
        {{-- Featured Collections --}}
    <section class="featured-collections">
        <h2>Featured Collections</h2>
        
           <div class="collections">
             @foreach($categories as $category)
              <!-- Example of featured collections -->
              <div class="collection-item">{{$category->name}}</div>
               @endforeach
           </div>
    </section>
     {{-- About Us --}}
    <section class="about-us">
        <h2>About Us</h2>
        <p>DIAS BOUTIQUE offers a curated selection of the latest fashion trends and luxury wear.</p>
        <a href="{{ route('about') }}" class="btn">Learn More</a>
    </section>
    <section>
      <h1>Explore Collections</h1>
     <div class="products">
         @foreach($exploreCollections as $product)
         <div class="product">
                   <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                   <h3>{{ $product->name }}</h3>
                    <p class="sale-price">Price : {{ $product->price }}</p>
                  </div>
         @endforeach
     </div>
    </section>
    
    {{-- Contact Info --}}
    <section class="contact-info">
        <h2>Contact Us</h2>
        <p>Phone: 99563 67892</p>
        <p>Email: diasboutique@gmail.com</p>
        <p>Address: 6/301 A3A,Fashion Street,<br>
                chennai-600017<br>
                Tamilnadu<br>
                India</p>
    </section>
    </body>
    </html>
    
@endsection
