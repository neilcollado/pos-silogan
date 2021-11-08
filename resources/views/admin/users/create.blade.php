@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <a href="javascript:history.back()" class="btn btn-md btn-primary mb-3">Back To Employee Listing</a>
          <div class="card">
              <div class="card-header">Register Employee</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('admin.users.store') }}">
                      @include('admin.users.partials.form')
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
