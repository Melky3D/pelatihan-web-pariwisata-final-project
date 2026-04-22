@extends('admin.master')
@section('content')

<h1>Edit Attractions</h1>

<a href="{{ route('admin.attractions.index') }}">Back to Attractions</a><p>

<form action="{{ route('admin.attractions.update', $attractions->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Attractions Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $attractions->name }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Attractions Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $attractions->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="ticket_price" class="form-label">Ticket Price</label>
        <input type="text" class="form-control" id="ticket_price" name="ticket_price" value="{{ $attractions->ticket_price }}" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Choose File</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Attractions</button>

@endsection