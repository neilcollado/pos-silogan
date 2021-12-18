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
                <th scope="col" class="text-center">OrderNo</th>
                <th scope="col" class="text-center">Total</th>
                <th scope="col" class="text-center">Payment</th>
                <th scope="col" class="text-center">Change</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)    
                <tr>
                    <th scope="row" class="text-center bg-info">{{ $orderNo[$count++] }}</th>
                    <td class="text-center">{{ $transaction->total }} PHP</td>
                    <td class="text-center">{{ $transaction->payment }} PHP</td>
                    <td class="text-center">{{ $transaction->change }} PHP</td>
                    <td class="text-center">{{ $transaction->created_at->toDateString() }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
@endsection