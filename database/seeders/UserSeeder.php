<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajars')->insert([
            [
                'nama' => 'mira',
                'email' => 'pengajar1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'kira',
                'email' => 'pengajar2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        DB::table('siswas')->insert([
            [
                'nama' => 'jian',
                'email' => 'siswa1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'xiao',
                'email' => 'siswa2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'jian',
                'email' => 'siswa1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'xiao',
                'email' => 'siswa2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mira',
                'email' => 'pengajar1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'kira',
                'email' => 'pengajar2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        DB::table('kategori_kursuses')->insert([
            ['nama' => 'Bahasa Jepang'],
            ['nama' => 'Bahasa Mandarin'],
            ['nama' => 'Bahasa Inggris'],
        ]);


    }
}
