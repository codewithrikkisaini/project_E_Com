<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Order\Index\Index as OrderIndex;
use App\Livewire\Admin\PaymentSettings\Form\Form as PaymentSettingsForm;
use App\Livewire\Admin\Testimonial\Form\Form as TestimonialForm;
use App\Livewire\Admin\User\Index\Index as UserIndex;
use App\Livewire\Admin\Product\Form\Form as ProductForm;
use Illuminate\Support\Facades\Route;

// Main frontend route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Essential routes for navigation components
Route::get('/products', \App\Livewire\Frontend\Product\Index::class)->name('products');
Route::get('/product/{slug}', \App\Livewire\Frontend\Product\Detail::class)->name('product.detail');
Route::get('/checkout', \App\Livewire\Frontend\Checkout\Index::class)->name('checkout');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/blog', \App\Livewire\Frontend\Blog\Index::class)->name('blog');

Route::get('/contact', \App\Livewire\Frontend\Contact\Index::class)->name('contact');

Route::get('/login', \App\Livewire\Frontend\Auth\Login::class)->name('login');
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    return view('welcome'); // Currently redirects to welcome, adjust if register view exists
})->name('register');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/products', ProductForm::class)->name('products');
    Route::redirect('/product/create', '/admin/products')->name('product.create');
    Route::get('/product/{product}/edit', ProductForm::class)->name('product.edit');

    Route::get('/banner', \App\Livewire\Admin\Banner\Form\Form::class)->name('banner');
    Route::get('/services', Dashboard::class)->name('services');
    Route::get('/about', Dashboard::class)->name('about');
    Route::get('/testimonials', TestimonialForm::class)->name('testimonials');
    Route::get('/orders', OrderIndex::class)->name('orders');
    Route::get('/users', UserIndex::class)->name('users');
    Route::get('/payment-settings', PaymentSettingsForm::class)->name('payment-settings');
    Route::get('/settings', \App\Livewire\Admin\Settings\Form\Form::class)->name('settings');
    Route::get('/blog-categories', \App\Livewire\Admin\BlogCategory\Form\Form::class)->name('blog-categories');
    Route::get('/blogs', \App\Livewire\Admin\Blog\Form\Form::class)->name('blogs');
    Route::get('/enquiries', \App\Livewire\Admin\Enquiry\Index::class)->name('enquiries');
});
// Database Management Routes (Backend Work)
Route::get('/migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return "Migrations successful!<br><pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";
    } catch (\Exception $e) {
        return "Migration failed: " . $e->getMessage();
    }
});

Route::get('/setup-db', function () {
    try {
        $dbName = env('DB_DATABASE', 'project_e_coo');
        $config = config('database.connections.mysql');
        $pdo = new PDO("mysql:host={$config['host']}", $config['username'], $config['password']);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
        return "Database `$dbName` created or already exists!";
    } catch (\Exception $e) {
        return "Database creation failed: " . $e->getMessage();
    }

});