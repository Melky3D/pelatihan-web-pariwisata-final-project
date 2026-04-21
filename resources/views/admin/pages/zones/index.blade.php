@extends('admin.master')
@section('content')

<h1>Zone Datatable  </h1>

<a href="{{ route('admin.zones.create') }}"><button class="btn btn-secondary">Create Zone</button></a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price Range</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($zones as $zone)
        <tr>
            <td>{{ $zone->id }}</td>
            <td>{{ $zone->name }}</td>
            <td>{{ $zone->description }}</td>
            <td>{{ $zone->price_range }}</td>
            <td><img src="{{ asset('storage/' . $zone->image) }}" alt="{{ $zone->name }}" width="100"></td>
            <td>
                <a href="{{ route('admin.zones.show', $zone->id) }}"><button class="btn btn-primary">View</button></a> 
                <a href="{{ route('admin.zones.edit', $zone->id) }}"><button class="btn btn-warning">Edit</button></a> 
                <form action="{{ route('admin.zones.destroy', $zone->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>    
</table>

@endsection