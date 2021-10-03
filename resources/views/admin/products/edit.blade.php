@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.update', $product->id)}}">
                        @method('PATCH')
                        @include('admin.products.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

