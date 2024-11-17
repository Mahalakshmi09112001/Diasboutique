<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DIAS BOUTIQUE')</title>
    <!-- Include any CSS files here -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css"
  rel="stylesheet"
/>
    
</head>
<body>
  <header>
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('home') }}">DIA'S BOUTIQUE</a>
        </div>
        <div class="search-bar">
            <input id="search-input" type="text" placeholder="Search for products..." />
            <button id="search-button" type="button">Search</button>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.index') }}">
                        <i class="fas fa-shopping-bag"></i> Shop
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>
                <li>
                    <a href="{{ route('checkout.index') }}">
                        <i class="fas fa-credit-card"></i> Checkout
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('account.index') }}">
                            <i class="fas fa-user-circle"></i> My Account
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </a>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>


    <main>
        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        @yield('content')
    </main>
{{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} DIAS BOUTIQUE. All rights reserved.</p>
        <ul>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
        <li><a href="{{ route('account.orders') }}">My Orders</a></li>
        <li><a href="{{ route('account.wishlist') }}">Wishlist</a></li>
        <li><a href="{{ route('shop.index') }}">Explore Shop</a></li>
        </ul>
    </footer>
    <!-- Include any JavaScript files here -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"
></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
