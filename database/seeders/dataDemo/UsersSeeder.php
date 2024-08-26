<?php

namespace Database\Seeders\dataDemo;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'creamynald@gmail.com',
                'password' => bcrypt('password'),
                'is_active' => true,
            ],
            [
                'name' => 'Admin',
                'email' => 'sityaminahh3@gmail.com',
                'password' => bcrypt('password'),
                'is_active' => true,
            ],
            [
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@gmail.com',
                'password' => bcrypt('password'),
                'is_active' => true,
            ],
            [
                'name' => 'Siswa',
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('password'),
                'is_active' => true,
            ],
        ]);
    }
}
