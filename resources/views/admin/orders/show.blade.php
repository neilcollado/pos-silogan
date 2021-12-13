@extends('layouts.app')

@section('content')
<div class="container">
  @include('partials.alerts')
  <div class="d-flex justify-content-between mt-3">
    <div class="col-md-9">
      @if ($orders->status == "paid")
      <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mb-2" type="button">Back to order listing</a>
      @endif
      <table class="table" style="background-color: white">
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
              <td><strong>{{ $product->UnitPrice }}</strong> PHP</td>
              <td><strong>{{ $product->pivot->Quantity * $product->UnitPrice}}</strong> PHP</td>
              
            </tr>
          @endforeach
            @if ($orders->status == "paid")
            <tr>
              <td></td><td></td><td></td><td></td><td></td>
              <td><strong>TOTAL</strong></td>
              <td><strong>{{ $orders->Total }}</strong> PHP</td>
            </tr>
            <tr>
              <td></td><td></td><td></td><td></td><td></td><td></td>
              <td><a href="{{ route('admin.orders.complete', $orders->id) }}" class="btn btn-success" role="button">Complete</a></td>
            </tr>
            @endif
        </tbody>
      </table>
    </div>

    @if ($orders->status == "pending")
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
          <div class="d-flex justify-content-around mb-2">
            <input type="submit" class="btn btn-success" value="Submit">
            <a href="{{ route('admin.orders.cancel', $orders->id) }}" class="btn btn-danger" role="button">Cancel</a>
          </div>
        </div>
      </form>     
    </div>
    @endif

    
    
    

  </div>
</div>
@endsection