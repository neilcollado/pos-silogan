@extends('layouts.app')

@section('content')
<link href="css/forms.css" rel="stylesheet" />
<div class="login-page" style="margin-top: -50px">
<div style="font-size: 25px; color:white">{{ __('Registration') }}</div>
  <div class="form">
    <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <input placeholder="Name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <input placeholder="E-mail Address" type="email" class="@error('password') is-invalid @enderror" name="email" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <input placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <input placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password">


            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
        </div>
    </form>
  </div>
</div>
@endsection
