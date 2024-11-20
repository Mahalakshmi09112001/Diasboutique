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
               <td>
                   <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-inline">
                       @csrf
                       @method('PATCH')
                       <select name="status" class="form-select" onchange="this.form.submit()">
                           <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                           <option value="Processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>Processing</option>
                           <option value="Completed" {{ $order->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                           <option value="Cancelled" {{ $order->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                       </select>
                   </form>
               </td>
               <td>
                   <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">View</a>
               </td>
           </tr>
           @endforeach
        </tbody>
    </table>
</div>
@endsection
