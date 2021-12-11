@extends('layouts.app')

@section('content')
<head>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
</head>
<section class="food_section layout_padding-bottom">
    <div class="container">
    <a href="javascript:history.back()" class="btn btn-md btn-primary">Back To Product Listing</a>
      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4">
            <div class="box" style="margin: 20px -380px 0 380px">
              <div>
                <div class="img-box">
                  <img src="{{ asset('uploads/products/' . $product->ProdPicture) }}" alt="">
                </div>
                <div class="detail-box">
                  <div class="d-flex justify-content-between">
                    <h5>{{ $product->ProdName }}</h5>
                   
                    <h5>
                      {{ $product->UnitPrice }} PHP
                    </h5>
                  </div>
                  {{-- category --}}
                  @if ($product->category_id == 1)
                  <h5>Silog</h5>
                  @elseif($product->category_id == 1)
                  <h5>Beverage</h5>
                  @else
                  <h5>Add-on</h5>
                  @endif
                  {{-- category-end --}}
                  <p></p>
                  <hr class="bg-white">
                  <p>{{ $product->ProdDescription }}</p>
                  <div class="options">
                    <h6>
                    </h6>
                    <a href="{{ route('admin.products.edit', $product->id) }}" style="color:black">Edit</a>
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
        </div>
      </div>
    </div>
  </section>
@endsection