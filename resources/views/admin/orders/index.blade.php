@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @include('partials.alerts')
    <div class="row">
        <div class="col-12">
        <h2 class="mb-3 float-left">Product Listing</h2>
        @can('is-admin')
            <a href="{{ route('admin.orders.create') }}" class="btn btn-md btn-success float-right" role="button">Add Order</a>
        @endcan
        </div>
    </div>
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Order Items</th>
                <th scope="col">Total Price</th>
                @can('is-admin')
                <th scope="col">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach ($order as $order)    
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->ProdName }}</td>
                    <td>{{ $order->ProdDescription }}</td>
                    <td>{{ $order->UnitPrice }}</td>
                    <td>{{ $product->isAvailable }}</td>
                    @can('is-admin')
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                        
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>

                        <button type="button" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault();
                            document.getElementById('delete-product-from-{{ $product->id }}').submit()">
                            Delete
                        </button>

                        <form id="delete-product-from-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach    
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
@endsection