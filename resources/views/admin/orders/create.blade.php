@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <form method="POST" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data" id="orderForm">
              @include('admin.orders.partials.form')
            </form>       
        </div>
    </div>
</div>
@include('admin.orders.partials.jquery');
@endsection

