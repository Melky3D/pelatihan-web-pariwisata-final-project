<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Reviews::with('reviewable')->latest()->paginate(10);
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewable_type' => 'required|string',
            'reviewable_id' => 'required|integer',
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        Reviews::create([
            'reviewable_type' => $validated['reviewable_type'],
            'reviewable_id' => $validated['reviewable_id'],
            'visitor_name' => $validated['visitor_name'],
            'visitor_email' => $validated['visitor_email'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_approved' => false,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted and is pending approval.');
    }

    public function approve(Reviews $review)
    {
        $review->update(['is_approved' => true]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review approved successfully.');
    }

    public function disapprove(Reviews $review)
    {
        $review->update(['is_approved' => false]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review disapproved successfully.');
    }

    public function detail($type, $id)
    {
        // Fetch the reviews for the specific zone/attraction
        $reviews = Reviews::where('reviewable_type', $type)->where('reviewable_id', $id)->get();

        // Pass the reviews to the view
        return view('landing.pages.detail', compact('reviews'));
    }

     public function destroy($id)
    {
        $reviews = Reviews::find($id);
        if ($reviews) {
            $reviews->delete();
            return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
        }else {
            return redirect()->route('admin.reviews.index')->with('error', 'Review not found.');
        }
    }

    

}