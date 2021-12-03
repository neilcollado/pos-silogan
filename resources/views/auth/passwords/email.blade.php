@extends('layouts.app')

@section('content')
<link href="../css/forms.css" rel="stylesheet" />
<div class="login-page" style="margin-top: -50px">
<div style="font-size: 25px; color:white">{{ __('Reset Password') }}</div>
  <div class="form">
  <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input placeholder="E-mail Address" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                    </form>
                </div>
  </div>
</div>
@endsection
