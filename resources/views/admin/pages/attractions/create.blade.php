@extends('admin.master')
@section('content')

<h1>Create New Attractions</h1>

<a href="{{ route('admin.attractions.index') }}">Back to Attractions</a><p>

<form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Attractions Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Attractions Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="ticket_price" class="form-label">Ticket Price</label>
        <input type="number" class="form-control" id="ticket_price" name="ticket_price" step="0.01" min="0" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Choose File</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Create Attractions</button>

@endsection