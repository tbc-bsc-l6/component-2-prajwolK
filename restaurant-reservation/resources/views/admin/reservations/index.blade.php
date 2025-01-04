@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Manage Reservations</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Table</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->table->name }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>
                            @if($reservation->status === 'pending')
                                <a href="{{ route('reservations.update', $reservation->id) }}" class="btn btn-success">Confirm</a>
                            @else
                                <span>Confirmed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
