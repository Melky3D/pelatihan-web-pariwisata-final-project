<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AttractionsController;
use App\Http\Controllers\ReviewsController;
use App\Models\Zone;
use App\Models\Attractions;
use App\Models\Reviews;

Route::get('/', function () {
    $zones = Zone::all();
    $attractions = Attractions::all();
    return view('landing.pages.index', compact('zones', 'attractions'));
});

Route::get('/detail/{type}/{id}', function ($type, $id) {
    if ($type === 'attraction') {
        $item = Attractions::findOrFail($id);
        $itemType = 'attraction';
        $modelClass = 'App\\Models\\Attractions';
    } elseif ($type === 'zone') {
        $item = Zone::findOrFail($id);
        $itemType = 'zone';
        $modelClass = 'App\\Models\\Zone';
    } else {
        abort(404);
    }

    $approvedReviews = Reviews::where('reviewable_type', $modelClass)
        ->where('reviewable_id', $id)
        ->where('is_approved', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('landing.pages.detail', compact('item', 'itemType', 'approvedReviews'));})->name('landing');



Route::get('/reviews/detail/{type}/{id}', [ReviewsController::class, 'detail'])->name('landing.reviews.detail');
Route::post('/reviews', [ReviewsController::class, 'store'])->name('reviews.store');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.index');
    })->name('admin.index');

    Route::resource('zones', ZoneController::class);
    Route::resource('attractions', AttractionsController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::patch('/reviews/{review}/approve', [ReviewsController::class, 'approve'])->name('reviews.approve');
});

Route::get('/dashboard', function () {
    return view('admin.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
