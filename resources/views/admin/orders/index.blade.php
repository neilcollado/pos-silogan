@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @include('partials.alerts')
    
    {{-- to be delivered --}}
    <div class="row mt-5">
        <div class="col-12">
        <h2 class="mb-3 float-left">Order Listing</h2>
        <a href="{{ route('admin.orders.create') }}" class="btn btn-md btn-success float-right" role="button">Add Order</a>
        </div>
    </div>
    
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="col-md-1 text-center">OrderNo</th>
                <th scope="col" class="col-md-2 text-center">EmployeeID</th>
                <th scope="col" class="col-md-3 text-center">Employee</th>
                <th scope="col" class="col-md-2 text-center">Status</th>
                <th scope="col" class="col-md-2 text-center">Type</th>
                <th scope="col" class="col-md-2 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paid as $op)    
                <tr>
                    <td class="bg-info text-center">{{ $op->orderNo }}</td>
                    <td class="text-center">{{ $op->user_id }}</td>
                    <td class="text-center">{{ $op->emp_name }}</td>
                    <td class="text-center">{{ $op->status }}</td>
                    <td class="text-center">{{ $op->type }}</td>
                    
                    <td class="text-center">
                        <a href="{{ route('admin.orders.show', $op->id) }}" class="btn btn-sm btn-primary">View</a>
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