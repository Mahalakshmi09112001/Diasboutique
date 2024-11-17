@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Welcome to Admin Dashboard</h1>
    
    <div class="row">
        <!-- Overview Cards -->
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <p class="card-text">${{ number_format($totalRevenue, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Recent Orders</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">View All Orders</a>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Recent Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentUsers as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">View All Users</a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Quick Actions</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-info w-100">Manage Products</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-success w-100">Manage Categories</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-warning w-100">Manage Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
