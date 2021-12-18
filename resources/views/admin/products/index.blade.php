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
                <th scope="col" class="col-md-1 text-center">ID</th>
                <th scope="col" class="col-md-2 text-center">Product Name</th>
                <th scope="col" class="col-md-6 text-center">Product Description</th>
                <th scope="col" class="col-md-1 text-center">Category</th>
                <th scope="col" class="col-md-1 text-center">UnitPrice</th>
                <th scope="col" class="col-md-1 text-center">Available</th>
                <th scope="col" class="col-md-1 text-center">Actions</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)    
                <tr>
                    <th scope="row" class="text-center bg-info align-middle">{{ $product->id }}</th>
                    <td class="text-center align-middle">{{ $product->ProdName }}</td>
                    <td class="text-center align-middle">{{ $product->ProdDescription }}</td>
                    @if ($product->category_id == 1)
                        {{-- Silog --}}
                        <td class="text-center align-middle">Silog</td>
                    @elseif($product->category_id == 2)
                        {{-- Beverage --}}
                        <td class="text-center align-middle">Beverage</td>
                    @else
                        {{-- Add-On --}}
                        <td class="text-center align-middle">Add-on</td>
                    @endif

                    <td class="text-center align-middle">{{ $product->UnitPrice }} PHP</td>
                    @if ($product->isAvailable == 1)
                        <td class="text-center bg-success text-black align-middle"><p><strong>Available</strong></p></td>
                    @else
                        <td class="text-center bg-danger text-white align-middle"><p>Unavailable</p></td>
                    @endif
                    
                    <td class="text-center d-flex flex-column">
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-primary mt-1">View</a>
                        @can('is-admin')
                        
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning mt-1" role="button">Edit</a>

                        <button type="button" class="btn btn-sm btn-danger mt-1"
                            onclick="event.preventDefault();
                            document.getElementById('delete-product-from-{{ $product->id }}').submit()">
                            Delete
                        </button>

                        <form id="delete-product-from-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endcan
                    </td>  
                </tr>
            @endforeach    
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
@endsection