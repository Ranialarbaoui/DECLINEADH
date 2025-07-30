<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdhUser;
use Illuminate\Support\Facades\Hash;

class AdhUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create test users with default password "caarama"
        AdhUser::create([
            'id' => 'TEST001',
            'nom' => 'Utilisateur Test 1',
            'email' => 'test1@example.com',
            'password' => Hash::make('caarama'),
        ]);

        AdhUser::create([
            'id' => 'TEST002',
            'nom' => 'Utilisateur Test 2',
            'email' => 'test2@example.com',
            'password' => Hash::make('caarama'),
        ]);

        AdhUser::create([
            'id' => 'ADMIN001',
            'nom' => 'Administrateur',
            'email' => 'admin@example.com',
            'password' => Hash::make('caarama'),
        ]);

        // Create a user with a custom password to test both scenarios
        AdhUser::create([
            'id' => 'USER001',
            'nom' => 'Utilisateur avec mot de passe personnalisé',
            'email' => 'user@example.com',
            'password' => Hash::make('motdepasse123'),
        ]);
    }
}
