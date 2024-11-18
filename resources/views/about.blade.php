@extends('layouts.app')

@section('title', 'About')

@section('content')
<!-- About Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="section-heading text-uppercase">About Us</h2>
            <p class="section-subheading">We are passionate about delivering high-quality products and services to our customers. Our team is dedicated to bringing the best shopping experience through innovation and excellence.</p>
            <p>We believe in creating strong customer relationships and offering personalized attention. Our boutique offers a wide range of exclusive fashion collections that are always in style and trend.</p>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <img src="{{asset('assets/img/logo.webp')}}" class="card-img-top" alt="About Image">
                <div class="card-body">
                    <h5 class="card-title">Our Vision</h5>
                    <p class="card-text">To be the leading fashion boutique, known for its unique collections and exceptional customer service.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
