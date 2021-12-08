@extends('layouts.app')

@section('content')
<div class="container mt-5">
  @include('partials.alerts')
  <div class="row">
     <div class="col-12">
      <h2 class="mb-3 float-left">Employee Listing</h2>
      <a href="{{ route('admin.users.create') }}" class="btn btn-md btn-success float-right" role="button">Add Employee</a>
     </div>
  </div>
  <div class="card px-2">
      <table class="table">
          <thead>
          <tr>
              <th scope="col" class="text-center">ID</th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)    
              <tr>
                  <th scope="row" class="text-center bg-info">{{ $user->id }}</th>
                  <td class="text-center">{{ $user->name }}</td>
                  <td class="text-center">{{ $user->email }}</td>
                  <td class="text-center">
                      {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a> --}}
                      
                      <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-primary">View</a>

                      <button type="button" class="btn btn-sm btn-danger"
                          onclick="event.preventDefault();
                          document.getElementById('delete-user-from-{{ $user->id }}').submit()">
                          Delete
                      </button>

                      <form id="delete-user-from-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                      </form>
                  </td>
              </tr>
          @endforeach    
          </tbody>
      </table>
      {{ $users->links() }}
  </div>
</div>
@endsection