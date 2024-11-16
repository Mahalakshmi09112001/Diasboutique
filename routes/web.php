<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\{
    DashboardController,
    ProductController,
    OrderController,
    CustomerController,
    CategoryController,
    ReportController,
    SettingController,
    PromotionController,
    UserController,
    ContentController
};

// ADMIN ROUTES
// Group all admin routes with middleware and prefix
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Product Management
        Route::resource('products', ProductController::class);

        // Order Management
        Route::resource('orders', OrderController::class)->only(['index', 'show']);

        // Customer Management
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');

        // Category Management
        Route::resource('categories', CategoryController::class);

        // Reports and Analytics
        Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
        Route::get('reports/performance', [ReportController::class, 'performance'])->name('reports.performance');

        // Settings
        Route::get('settings/general', [SettingController::class, 'general'])->name('settings.general');
        Route::get('settings/payment', [SettingController::class, 'payment'])->name('settings.payment');
        Route::get('settings/shipping', [SettingController::class, 'shipping'])->name('settings.shipping');

        // Promotions and Discounts
        Route::get('promotions/discounts', [PromotionController::class, 'index'])->name('promotions.index');
        Route::get('promotions/events', [PromotionController::class, 'events'])->name('promotions.events');

        // User Management
        Route::resource('users', UserController::class);

        // Content Management
        Route::get('content/cms', [ContentController::class, 'cms'])->name('content.cms');
        Route::get('content/blog', [ContentController::class, 'blog'])->name('content.blog');
    });

// PUBLIC ROUTES
// Home Page
Route::get('/', [PageController::class, 'home'])->name('home');

// Product Pages
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

// Cart Pages - Authenticated Users Only
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
     Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
});

// Checkout Pages - Authenticated Users Only
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// Order Confirmation - Authenticated Users Only
Route::middleware('auth')->get('/order-confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');


// User Account Pages
Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/wishlist', [AccountController::class, 'wishlist'])->name('account.wishlist');
    Route::get('/account/settings', [AccountController::class, 'settings'])->name('account.settings');
     Route::put('/account/settings', [AccountController::class, 'updateSettings'])->name('account.settings.update');
});

// Static Pages
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');





// AUTH FILE
require __DIR__.'/auth.php';
