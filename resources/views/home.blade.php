@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{ Auth::user()->name }} !
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Sales</th>
                            <th scope="col">Today</th>
                            <th scope="col">Month</th>
                            <th scope="col">Year</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td>{{ $salesT }} PHP</td>
                            <td>{{ $salesM }} PHP</td>
                            <td>{{ $salesY }} PHP</td>
                          </tr>    
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
