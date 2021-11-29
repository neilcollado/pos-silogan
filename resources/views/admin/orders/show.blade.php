@extends('layouts.app')

@section('content')
<div class="container">
  @include('partials.alerts')
  <a href="{{ route('admin.orders.index') }}" class="btn btn-md btn-primary">Back To Order Listing</a>

  <div class="d-flex justify-content-between mt-3">
    <div class="col-md-9">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Order ID: {{ $orders->id }}</th>
            <th scope="col">Order No: {{ $orders->orderNo }}</th>
            <th scope="col">Employee: {{ $orders->emp_name }}</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders->products as $product)
            <tr>
              <th scope="row"></th>
              <td></td>
              <td></td>
              <td>{{ $product->ProdName }}</td>
              <td>{{ $product->pivot->Quantity }}</td>
              <td>{{ $product->UnitPrice }}</td>
              <td>{{ $product->pivot->Quantity * $product->UnitPrice}}</td>
              
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-md-3">
      <form method="POST" action="{{ route('admin.transactions.store') }}" enctype="multipart/form-data" id="orderForm">
        @csrf
        <div class="card">
          <div class="card-header">Payment</div>
          <div class="card-body">
            <input type="hidden" name="orderID" value="{{ $orders->id }}">
            <label for="total">Total:</label>
            <input type="number" name="total" value="{{ $orders->Total }}" readonly>
            <label for="payment">Amount:</label>
            <input type="number" name="payment">
          </div>
          <input type="submit" class="btn btn-success" value="Submit">
        </div>
      </form>     
    </div>
    
    

  </div>
</div>
@endsection