@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @include('partials.alerts')
    <div class="row">
        <div class="col-12">
        <h2 class="mb-3 float-left">Order History</h2>
        </div>
    </div>
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">OrderID</th>
                <th scope="col">Order#</th>
                <th scope="col">EmployeeID</th>
                <th scope="col">Employee</th>
                <th scope="col">Status</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)    
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->orderNo }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->emp_name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->type }}</td>
                    
                    <td>
                        <a href="{{ route('admin.orderHistory.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
@endsection