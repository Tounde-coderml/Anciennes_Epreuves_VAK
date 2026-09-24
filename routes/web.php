<?php

use App\Http\Controllers\Admin\FiliereController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login')->name('login');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (): void {
    Route::resource('filieres', FiliereController::class);
});
