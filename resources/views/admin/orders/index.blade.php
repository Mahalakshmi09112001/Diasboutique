@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
<div class="container mt-5">
    <h1>Order List</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->status }}</td>
        <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info">View</a></td>
    </tr>
@endforeach

        </tbody>
    </table>
</div>
@endsection
