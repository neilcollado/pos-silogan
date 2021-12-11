@extends('layouts.app')

@section('content')
<head>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
</head>
<section class="food_section layout_padding-bottom">
    <div class="container">
    <a href="javascript:history.back()" class="btn btn-md btn-primary">Back To Product Listing</a>
      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4">
            <div class="box" style="margin: 20px -380px 0 380px">
              <div>
                <div class="img-box">
                  <img src="{{ asset('uploads/users/' . $user->profilePicture) }}" class=" rounded" alt="Profile Picture">
                </div>
                <div class="detail-box">
                  <div class="d-flex justify-content-between">
                    <h5>{{ $user->name }}</h5>
                    <h5>ID: #{{ $user->id }}</h5>
                  </div>
                  <hr class="bg-white">
                  <div class="d-flex justify-content-between">
                    <p>Email: {{ $user->email }}</p>
                    <p>Role: Employee</p>
                  </div>
                  
                  <div class="options">
                   {{-- <a href="{{ route('admin.users.edit', $user->id) }}" style="color:black">Edit</a>--}}
                    <button type="button" class="btn btn-sm btn-danger"
                      onclick="event.preventDefault();
                      document.getElementById('delete-user-from-{{ $user->id }}').submit()">
                      Delete
                    </button>

                    <form id="delete-user-from-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection