<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // Check if user is authenticated
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    // Show welcome page for guests
    return Inertia::render('Welcome');
})->name('home')->middleware('auth');

Route::get('dashboard', function () {
    $people = \App\Models\Person::all();
    return Inertia::render('Dashboard',['people' =>$people]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/persons.index', [PersonController::class, 'index'])->name('persons.index');
    Route::get('/persons/create', [PersonController::class, 'create'])->name('persons.create');
    Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
    Route::get('/persons/{person}', [PersonController::class, 'show'])->name('persons.show');
    Route::get('/persons/{person}/edit', [PersonController::class, 'edit'])->name('persons.edit');
    Route::put('/persons/{person}', [PersonController::class, 'update'])->name('persons.update');
    Route::delete('/persons/{person}', [PersonController::class, 'destroy'])->name('persons.destroy');
});
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
