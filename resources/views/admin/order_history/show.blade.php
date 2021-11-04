@extends('layouts.app')

@section('content')
  <div class="container">
    <a href="javascript:history.back()" class="btn btn-md btn-primary">Back To Order Listing</a>
    <h1>{{ $order->id }}</h1>
  </div>
@endsection