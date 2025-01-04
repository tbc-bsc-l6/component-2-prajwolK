@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Reservation</h1>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="table_id" class="form-label">Table</label>
                <select class="form-select" id="table_id" name="table_id" required>
                    <option value="">Select Table</option>
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}" {{ old('table_id') == $table->id ? 'selected' : '' }}>
                            {{ $table->name }} (Capacity: {{ $table->capacity }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Reserve Table</button>
        </form>
    </div>
@endsection
