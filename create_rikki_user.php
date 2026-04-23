<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::updateOrCreate(
    ['email' => 'rikkisaini4455@gmail.com'],
    [
        'name' => 'Rikki Saini',
        'password' => Hash::make('Rikki@123'),
        'is_customer' => false, // Assuming False for admin
    ]
);

echo "User created/updated successfully: " . $user->email . "\n";
