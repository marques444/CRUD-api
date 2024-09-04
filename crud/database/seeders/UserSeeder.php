<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'danilo@exemplo.com')->first()) {
            User::create([
                'name' => 'Danilo',
                'email' => 'danilo@exemplo.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        
        if (!User::where('email', 'davi@exemplo.com')->first()) {
            User::create([
                'name' => 'Davi',
                'email' => 'davi@exemplo.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        
        if (!User::where('email', 'samuel@exemplo.com')->first()) {
            User::create([
                'name' => 'Samuel',
                'email' => 'samuel@exemplo.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }

        if (!User::where('email', 'edenilson@exemplo.com')->first()) {
            User::create([
                'name' => 'Edenilson',
                'email' => 'edenilson@exemplo.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        
    }
}
