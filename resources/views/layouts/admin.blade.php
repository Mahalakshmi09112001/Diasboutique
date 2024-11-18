<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DIAS BOUTIQUE')</title>
    <!-- Include any CSS files here -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>

</head>
<body>
<header>
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('home') }}">DIA'S BOUTIQUE</a>
        </div>
        
        <nav>
            <ul>
                <!-- Admin-specific Navigation -->
                @auth
                    @if(auth()->user()->UserType == 'admin') 
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Admin Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                                Manage Sliders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.banners.index') }}">
                                <i class="fas fa-image"></i> Manage Banners
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}">
                                <i class="fas fa-box-open"></i> Manage Products
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}">
                                <i class="fas fa-th-list"></i> Manage Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}">
                                <i class="fas fa-shopping-cart"></i> Orders
                            </a>
                        </li>
                    @endif

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </a>
                        </form>
                    </li>
                @endauth

                <!-- Guest links -->
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
        <br>
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
        <br>
    </main>

    {{-- Admin Footer --}}
    @auth
        @if(auth()->user()->is_admin)
        <footer>
            <p>&copy; {{ date('Y') }} DIAS BOUTIQUE Admin Panel. All rights reserved.</p>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}">Manage Users</a></li>
                <li><a href="{{ route('admin.products') }}">Manage Products</a></li>
                <li><a href="{{ route('admin.orders') }}">Orders</a></li>
                <li><a href="{{ route('admin.settings') }}">Settings</a></li>
            </ul>
        </footer>
        @else
        {{-- Footer for non-admin users --}}
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
        @endif
    @endauth

    <!-- Include any JavaScript files here -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>  
</body>
</html>
