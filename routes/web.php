<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatamemberController;

Route::get('/', function () {
    return redirect()->route('datamember.index');
});

// CRUD Datamember
Route::resource('datamember', DatamemberController::class);