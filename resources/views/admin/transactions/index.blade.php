@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @include('partials.alerts')
    <div class="row">
        <div class="col-12">
        <h2 class="mb-3 float-left">Transactions</h2>
        </div>
    </div>
    <div class="card px-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">OrderID</th>
                <th scope="col">Total</th>
                <th scope="col">Payment</th>
                <th scope="col">Change</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)    
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->orders_id }}</td>
                    <td>PHP {{ $transaction->total }}</td>
                    <td>PHP {{ $transaction->payment }}</td>
                    <td>PHP {{ $transaction->change }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>

    </div>
</div>
@endsection