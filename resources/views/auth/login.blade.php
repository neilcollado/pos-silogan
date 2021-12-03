@extends('layouts.app')

@section('content')
<link href="css/forms.css" rel="stylesheet" />
<div class="login-page" style="margin-top: -50px">
<div style="font-size: 25px; color:white">{{ __('Login') }}</div>
  <div class="form">
    <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <input placeholder="E-mail Address" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
        </div>
    </form>
  </div>
</div>
@endsection
