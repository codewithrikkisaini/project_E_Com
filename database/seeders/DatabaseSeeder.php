<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'rikkisaini4455@gmail.com'],
            [
                'name' => 'Rikki Saini',
                'password' => \Illuminate\Support\Facades\Hash::make('Rikki@123'),
            ]
        );
    }
}
