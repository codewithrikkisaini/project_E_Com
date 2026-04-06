<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Order\Index\Index as OrderIndex;
use App\Livewire\Admin\PaymentSettings\Form\Form as PaymentSettingsForm;
use App\Livewire\Admin\Testimonial\Form\Form as TestimonialForm;
use App\Livewire\Admin\User\Index\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::livewire('/products', 'admin.product.form.form')->name('products');
    Route::redirect('/product/create', '/admin/products')->name('product.create');
    Route::livewire('/product/{product}/edit', 'admin.product.form.form')->name('product.edit');

    Route::get('/banner', Dashboard::class)->name('banner');
    Route::get('/services', Dashboard::class)->name('services');
    Route::get('/about', Dashboard::class)->name('about');
    Route::get('/testimonials', TestimonialForm::class)->name('testimonials');
    Route::get('/orders', OrderIndex::class)->name('orders');
    Route::get('/users', UserIndex::class)->name('users');
    Route::get('/payment-settings', PaymentSettingsForm::class)->name('payment-settings');
    Route::get('/settings', Dashboard::class)->name('settings');
    Route::get('/blog-categories', Dashboard::class)->name('blog-categories');
    Route::get('/blogs', Dashboard::class)->name('blogs');
    Route::get('/enquiries', Dashboard::class)->name('enquiries');
});
