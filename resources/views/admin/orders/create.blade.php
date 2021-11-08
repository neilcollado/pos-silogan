@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="javascript:history.back()" class="btn btn-md btn-primary mb-3">Back To Order Listing</a>
            <div class="card">
                <div class="card-header">Create Order</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data" id="orderForm">
                    @include('admin.orders.partials.form')
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.orders.partials.jquery');
@endsection

