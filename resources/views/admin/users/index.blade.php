@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-3 float-left">User Listing</h2>
            <!-- <a href="{{ route('admin.products.create') }}" class="btn btn-md btn-success float-right" role="button">Add Product</a> -->
        </div>
    </div>
    
    <div class="card px-2">
        <table class="table">
        <thead>
                <tr>
                    <th scope="col">ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)    
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                            
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