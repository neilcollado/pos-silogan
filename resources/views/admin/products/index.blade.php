@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @include('partials.alerts')
    <div class="row">
        <div class="col-12">
        <h2 class="mb-3 float-left">Product Listing</h2>
        @can('is-admin')
            <a href="{{ route('admin.products.create') }}" class="btn btn-md btn-success float-right" role="button">Add Product</a>
        @endcan
        </div>
    </div>
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID#</th>
                <th scope="col" class="col-md-2">Product Name</th>
                <th scope="col" class="col-md-4">Product Description</th>
                <th scope="col">UnitPrice</th>
                <th scope="col">Available</th>
                @can('is-admin')
                <th scope="col">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)    
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->ProdName }}</td>
                    <td>{{ $product->ProdDescription }}</td>
                    <td>{{ $product->UnitPrice }}</td>
                    <td>{{ $product->isAvailable }}</td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                        @can('is-admin')
                        
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>

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