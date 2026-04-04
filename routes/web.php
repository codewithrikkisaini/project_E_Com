<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});