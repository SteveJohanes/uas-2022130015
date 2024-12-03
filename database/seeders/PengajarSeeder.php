<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengajar;
use Illuminate\Support\Facades\Hash;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengajar::insert([
            [
                'name' => 'Pengajar Satu',
                'email' => 'pengajar@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
