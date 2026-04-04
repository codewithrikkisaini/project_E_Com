<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::livewire('/products', 'admin.product.form.form')->name('products');
    Route::livewire('/product/create', 'admin.product.form.form')->name('product.create');
    Route::livewire('/product/{product}/edit', 'admin.product.form.form')->name('product.edit');
});
