@csrf
<input placeholder="Name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}@isset($user){{$user->name}}@endisset" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<input placeholder="E-mail Address" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}@isset($user){{$user->email}}@endisset" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<div class="form-group row">
    {{-- Product picture --}}
    <label for="profilePicture" class="col-md-4 col-form-label text-md-right" >Image</label>
    @isset($user)
    <div class="img-box">
        <img src="{{ asset('uploads/users/' . $user->profilePicture) }}" alt="profile image" 
        class="img-thumbnail" style="max-width: 40vh">
    </div>
    @endisset

    <div class="col-md-12 col-form-label text-center">
        <input id="profilePicture" type="file" class="btn btn-sm @error('profilePicture') is-invalid @enderror" 
        name="profilePicture">
        @error('profilePicture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>                                           
</div>

@if (!isset($user))
    <div class="form-group row">
        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

        <div class="col-md-6">
            <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="silogan123">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

        <div class="col-md-6">
            <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation" required autocomplete="new-password" value="silogan123">
        </div>
    </div>
@endif

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if (isset($user))
        <button type="submit" class="btn btn-warning" style="white-space:nowrap; margin-left: -100px; height:50px">Edit</button>    
        @else
        <button type="submit" class="btn btn-success" style="white-space:nowrap; margin-left: -100px; height:50px">Add Employee</button>   
        @endif
        <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-danger" style="height:50px; padding-top:12px">Cancel</a>
    </div>
</div>