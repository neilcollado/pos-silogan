@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @include('partials.alerts')

    {{-- To be paid --}}
    <div class="row">
        <div class="col-12">
        <h2 class="mb-3 float-left">Pending Orders</h2>
        <a href="{{ route('admin.orders.create') }}" class="btn btn-md btn-success float-right" role="button">Add Order</a>
        </div>
    </div>
    
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">OrderID</th>
                <th scope="col">OrderNo</th>
                <th scope="col">EmployeeID</th>
                <th scope="col">Employee</th>
                <th scope="col">Status</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pending as $p)    
                <tr>
                    <th scope="row">{{ $p->id }}</th>
                    <td>{{ $p->orderNo }}</td>
                    <td>{{ $p->user_id }}</td>
                    <td>{{ $p->emp_name }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->type }}</td>
                    
                    <td>
                        <a href="{{ route('admin.orders.show', $p->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('admin.orders.cancel', $p->id) }}" class="btn btn-sm btn-danger" role="button">Cancel</a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        {{ $pending->links() }}
    </div>

    {{-- to be delivered --}}
    <div class="row mt-5">
        <div class="col-12">
        <h2 class="mb-3 float-left">Order Listing</h2>
        
        </div>
    </div>
    
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">OrderID</th>
                <th scope="col">OrderNo</th>
                <th scope="col">EmployeeID</th>
                <th scope="col">Employee</th>
                <th scope="col">Status</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paid as $op)    
                <tr>
                    <th scope="row">{{ $op->id }}</th>
                    <td>{{ $op->orderNo }}</td>
                    <td>{{ $op->user_id }}</td>
                    <td>{{ $op->emp_name }}</td>
                    <td>{{ $op->status }}</td>
                    <td>{{ $op->type }}</td>
                    
                    <td>
                        <a href="{{ route('admin.orders.complete', $op->id) }}" class="btn btn-sm btn-success" role="button">Complete</a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        {{ $paid->links() }}
    </div>

</div>
@endsection