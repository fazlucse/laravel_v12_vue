<?php
Route::post('/login', 'App\Http\Controllers\UserController@authenticate');
Route::middleware(['api.auth'])->group(function () {
    Route::post('/secure', fn () => response()->json(['message' => 'Authorized!']));
});
