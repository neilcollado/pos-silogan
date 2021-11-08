@extends('layouts.app')

@section('content')
<div class="container">
  <a href="javascript:history.back()" class="btn btn-md btn-primary">Back To Order Listing</a>

  
  <table class="table">
    <thead>
     
      <tr>
        <th scope="col">Order #{{ $orders->id }}</th>
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
          <td>{{ $product->ProdName }}</td>
          <td>{{ $product->pivot->Quantity }}</td>
          <td>{{ $product->UnitPrice }}</td>
          <td>{{ $product->pivot->Quantity * $product->UnitPrice}}</td>
          
        </tr>
      @endforeach
        <tr>
          <th scope="row">
            <a href="{{ route('admin.orders.complete', $orders->id) }}" class="btn btn-md btn-success">Complete</a>
          </th>
          <td></td>
          <td></td>
          <td><h4>TOTAL</h4></td>
          <td><h4>{{ $orders->Total }}</h4></td>
        </tr>
    </tbody>
  </table>

  

  {{-- <a href="{{ route('admin.orders.complete', $order->id) }}" class="btn btn-sm btn-danger" role="button">Complete Order</a> --}}
</div>
@endsection