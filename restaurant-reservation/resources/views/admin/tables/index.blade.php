@extends('layouts.admin')

@section('title', 'Tables')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Tables</h1>
        <a href="{{ route('tables.create') }}" class="btn btn-primary">Add Table</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{ $table->id }}</td>
                    <td>{{ $table->name }}</td>
                    <td>{{ $table->capacity }}</td>
                    <td>{{ $table->status ? 'Available' : 'Unavailable' }}</td>
                    <td>
                        <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tables.destroy', $table->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
