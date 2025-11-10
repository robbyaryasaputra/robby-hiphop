<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateDataUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data['name']   = 'Clea ';
        $data['email']   = 'clea@pcr.ac.id';
        $data['password'] = Hash::make('clea12345');
        User::create($data);
    }
}
