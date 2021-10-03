@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <a href="javascript:history.back()" class="btn btn-md btn-primary">Back To Product Listing</a>
    <div class="card mb-3 mt-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="..." class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $product->ProdName }}</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection