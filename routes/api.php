<?php
use App\Http\Controllers\PageVisitController;
Route::post('/login', 'App\Http\Controllers\UserController@authenticate');
Route::post('/visitor', [PageVisitController::class, 'store']);
Route::get('/visitor/count', [PageVisitController::class, 'count']);
Route::middleware(['api.auth'])->group(function () {
    Route::post('/secure', fn () => response()->json(['message' => 'Authorized!']));

});
