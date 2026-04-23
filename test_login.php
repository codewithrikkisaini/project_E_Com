<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Auth;
use App\Models\User;

$credentials = [
    'email' => 'rikkisaini4455@gmail.com',
    'password' => 'Rikki@123'
];

echo "Testing login for: " . $credentials['email'] . "\n";

$user = User::where('email', $credentials['email'])->first();
if (!$user) {
    echo "ERROR: User does not exist in database.\n";
} else {
    echo "User found in DB. Password in DB: " . $user->password . "\n";
    
    if (Auth::attempt($credentials)) {
        echo "SUCCESS: Login successful!\n";
    } else {
        echo "FAILED: Login failed despite user existing.\n";
        
        // Manual hash check
        if (password_verify($credentials['password'], $user->password)) {
            echo "VERIFY: password_verify returns TRUE.\n";
        } else {
            echo "VERIFY: password_verify returns FALSE.\n";
        }
    }
}
