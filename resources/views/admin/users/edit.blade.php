@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Employee</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @include('admin.users.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

