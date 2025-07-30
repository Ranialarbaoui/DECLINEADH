<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdhUser;
use Illuminate\Support\Facades\Hash;

class AdhUserSeeder extends Seeder
{
    public function run()
    {
        AdhUser::create([
            'id' => '123456789', // remplace par un ID valide
            'password' => Hash::make('caarama'),
            // ajoute ici les autres colonnes obligatoires si besoin
        ]);
    }
}
