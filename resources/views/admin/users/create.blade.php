@extends('layouts.app')

@section('content')
<link href="../css/style.css" rel="stylesheet" />
<link href="../css/forms.css" rel="stylesheet" />
<div class="login-page" style="margin-top: -100px; margin-bottom: -60px">
<div style="font-size: 25px; color:white">{{ __('Add Employee') }}</div>
  <div class="form">
    <form class="login-form" method="POST" action="{{ route('admin.users.store') }}">
            @include('admin.users.partials.form')
    </form>
  </div>
</div>
@endsection
