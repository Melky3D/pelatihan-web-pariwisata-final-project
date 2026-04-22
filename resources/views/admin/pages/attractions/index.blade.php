@extends('admin.master')
@section('content')

<h1>Attractions Datatable  </h1>

<a href="{{ route('admin.attractions.create') }}"><button class="btn btn-secondary">Create Attraction</button></a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Ticket Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attractions as $attraction)
        <tr>
            <td>{{ $attraction->id }}</td>
            <td>{{ $attraction->name }}</td>
            <td>{{ $attraction->description }}</td>
            <td>{{ $attraction->ticket_price }}</td>
            <td><img src="{{ asset('storage/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="100"></td>
            <td>
                <a href="{{ route('admin.attractions.show', $attraction->id) }}"><button class="btn btn-primary">View</button></a> 
                <a href="{{ route('admin.attractions.edit', $attraction->id) }}"><button class="btn btn-warning">Edit</button></a> 
                <form action="{{ route('admin.attractions.destroy', $attraction->id) }}" method="POST" style="display:inline;">
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