<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory; // <-- Ditambahkan
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Ditambahkan
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateDataUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat 1 user spesifik (Clea)
        User::create([
            'name'     => 'Clea',
            'email'    => 'clea@pcr.ac.id',
            'password' => Hash::make('clea12345'),
        ]);

        // 2. Siapkan 999 user dummy
        $faker = Factory::create();
        $users = [];
        
        // Hash password satu kali saja di luar loop untuk performa
        $defaultPassword = Hash::make('password'); // Anda bisa ganti 'password'

        foreach (range(1, 999) as $index) {
            $users[] = [
                'name'       => $faker->name,
                'email'      => $faker->unique()->safeEmail,
                'password'   => $defaultPassword,
                'created_at' => now(), // Diperlukan saat menggunakan DB::table
                'updated_at' => now(), // Diperlukan saat menggunakan DB::table
            ];
        }

        // 3. Masukkan 999 user dummy dalam satu query
        DB::table('users')->insert($users);
    }
}