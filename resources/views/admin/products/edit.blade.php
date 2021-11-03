@extends('layouts.app')

@section('content')
<div class="container">
    <a href="javascript:history.back()" class="btn btn-md btn-primary">Back To Product Listing</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @include('admin.products.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

