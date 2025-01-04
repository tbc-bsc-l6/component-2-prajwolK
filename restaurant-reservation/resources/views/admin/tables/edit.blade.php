@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Table</h1>
    <form action="{{ route('tables.update', $table->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Table Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $table->name }}" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $table->capacity }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
