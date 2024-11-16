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
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" >
                <img class="d-block w-100 slideImg" src="{{asset('assets/img/slides/slider2new.jpg')}}" alt="First slide" >
                <div class="carousel-caption d-none d-md-block banner">
                        <h1>Special Offer!</h1>
                        <p>Get 10% off on all products!</p>
                        <button onclick="window.location.href='sale.html'">Shop Now</button>
                </div>
                </div>
                <div class="carousel-item">
                <img class="d-block w-100 slideImg" src="{{asset('assets/img/slides/slider3new.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100 slideImg" src="{{asset('assets/img/slides/slider2new.jpg')}}" alt="Third slide">
                </div>
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
        <a href="" class="btn">Learn More</a>
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
    {{-- Newsletter Signup --}}
    <section class="newsletter">
        <h2>Subscribe to Our Newsletter</h2>
        <form action="" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Subscribe</button>
        </form>
    </section>
    {{-- Contact Info --}}
    <section class="contact-info">
        <h2>Contact Us</h2>
        <p>Phone: +1 234 567 890</p>
        <p>Email: info@diasboutique.com</p>
        <p>Address: 123 Fashion Ave, Style City</p>
    </section>
    </body>
    </html>
    
@endsection
