@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
          <a href="javascript:history.back()" class="btn btn-md btn-primary mb-3">Back To Order Listing</a>
            <form method="POST" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data" id="orderForm">
              @include('admin.orders.partials.form')
            </form>       
        </div>
    </div>
</div>
@include('admin.orders.partials.jquery');
@endsection

