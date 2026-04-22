@extends('admin.master')
@section('content')
    <h1>Reviews Datatable</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Object Name</th>
                <th>Reviewer Name</th>
                <th>Reviewer Email</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->commentable_type === 'App\Models\Zone' ? 'Zone' : 'Attraction' }}</td>
                    <td>{{ $review->commentable_type === 'App\Models\Zone' ? $review->zone->name : $review->attraction->name }}
                    </td>
                    <td>{{ $review->visitor_name }}</td>
                    <td>{{ $review->visitor_email }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>(⭐ {{ $review->rating }})</td>
                    <td>{{ $review->is_approved ? 'Approved' : 'Pending' }}</td>
                    <td>

                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @if (!$review->is_approved)
                            <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-success" type="submit"
                                    onclick="return confirm('Approve this review?')">
                                    Approve
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
