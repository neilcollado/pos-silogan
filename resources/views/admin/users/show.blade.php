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
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="" alt="">
                </div>
                <div class="detail-box">
                  <h5>{{ $user->name }}</h5>
                  <p>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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