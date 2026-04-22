<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Attractions;
use App\Models\Reviews;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalZones = Zone::count();
        $totalAttractions = Attractions::count();
        $totalPendingReviews = Reviews::where('is_approved', false)->count();
        $totalApprovedReviews = Reviews::where('is_approved', true)->count();

        return view('admin.pages.index', compact(
            'totalZones',
            'totalAttractions',
            'totalPendingReviews',
            'totalApprovedReviews'
        ));
    }
}