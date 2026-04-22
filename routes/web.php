<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AttractionsController;
use App\Models\Zone;
use App\Models\Attractions;

Route::get('/', function () {

$zones = Zone::all();
$attractions = Attractions::all();
    return view('landing.pages.index', compact('zones', 'attractions'));
});

Route::get('/detail', function () {
    return view('landing.pages.detail');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
    return view('admin.pages.index'); })->name('admin.index');

    Route::resource('zones', ZoneController::class);
    Route::resource('attractions', AttractionsController::class);
});

Route::get('/dashboard', function () {
    return view('admin.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
