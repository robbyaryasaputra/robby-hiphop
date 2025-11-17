<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        $faker = Factory::create();
        $pelanggan = []; // 1. Buat array kosong

        foreach (range(1, 1000) as $index) {
            // 2. Tambahkan data ke dalam array
            $pelanggan[] = [
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'birthday'   => $faker->date('Y-m-d', '2005-12-31'),
                'gender'     => $faker->randomElement(['Male', 'Female', 'Other']),
                'email'      => $faker->unique()->safeEmail,
                'phone'      => $faker->phoneNumber,
            ];
        }

        // 3. Masukkan semua data sekaligus (hanya 1 query)
        DB::table('pelanggan')->insert($pelanggan);
    }
}