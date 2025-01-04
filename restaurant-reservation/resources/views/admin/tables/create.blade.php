@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Add New Table</h1>
    <form action="{{ route('tables.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Table Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
