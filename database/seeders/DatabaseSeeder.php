<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::firstOrCreate(
            ['email' => env('DEFAULT_USER_EMAIL', 'admin@email.com')],
            [
                'name' => 'Temporaire',
                'password' => env('DEFAULT_USER_PASSWORD', 'password'),
                'email_verified_at' => now(),
            ]
        );

        $this->call([
            TechnologieSeeder::class,
        ]);
    }
}
