@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Total Reservations</h4>
                    <p>{{ $reservationsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Total Tables</h4>
                    <p>{{ $tablesCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
