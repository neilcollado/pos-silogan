@extends('layouts.app')

@section('content')
<link href="../../css/style.css" rel="stylesheet" />
<link href="../../css/forms.css" rel="stylesheet" />
<div class="login-page" style="margin-top: -100px; margin-bottom: -60px">
<div style="font-size: 25px; color:white">{{ __('Edit Product') }}</div>
  <div class="form">
    <form class="login-form" method="POST" action="{{ route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
        @method('PATCH')
        @include('admin.products.partials.form')
    </form>
  </div>
</div>
@endsection




