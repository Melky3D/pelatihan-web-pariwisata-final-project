@extends('admin.master')
@section('content')

<h1>Edit Zone</h1>

<a href="{{ route('admin.zones.index') }}">Back to Zones</a><p>

<form action="{{ route('admin.zones.update', $zones->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Zone Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $zones->name }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Zone Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $zones->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="price_range" class="form-label">Price Range</label>
        <input type="text" class="form-control" id="price_range" name="price_range" value="{{ $zones->price_range }}" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Choose File</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Zone</button>

@endsection