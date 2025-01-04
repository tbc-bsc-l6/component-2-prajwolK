@extends('layouts.admin')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>Your role: {{ auth()->user()->role }}</p>

    @if(auth()->user()->isAdmin())
        <p>You have administrative privileges!</p>
    @else
        <p>You are a regular user.</p>
    @endif
@endsection
