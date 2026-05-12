<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController; // <-- WAJIB

Route::get('/user', function () {
    return response()->json([
        'name' => 'LALA CANTIK',
        'email' => 'Lalamoure@GMAIL.COM',
    ]);
}); 

Route::get('/product', function () {
    return response()->json([
        ['id' => 1, 'name' => 'Product A', 'price' => 100],
        ['id' => 2, 'name' => 'Product B', 'price' => 200],
        ['id' => 3, 'name' => 'Product C', 'price' => 300],
    ]);
});

Route::get('/useradmin', [ApiUserController::class, 'index']);