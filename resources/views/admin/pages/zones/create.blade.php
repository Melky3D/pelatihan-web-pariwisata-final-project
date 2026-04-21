@extends('admin.master')
@section('content')

<h1>Create New Zone</h1>

<a href="{{ route('admin.zones.index') }}">Back to Zones</a><p>

<form action="{{ route('admin.zones.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Zone Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Zone Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="price_range" class="form-label">Price Range</label>
        <input type="text" class="form-control" id="price_range" name="price_range" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Choose File</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Create Zone</button>

@endsection