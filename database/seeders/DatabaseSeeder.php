<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\dataDemo\{instansiSeeder, bidangInstasiSeeder, kegiatanSeeder, UsersSeeder};
use Database\Seeders\spatie\PermissionsDemoSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionsDemoSeeder::class,
            instansiSeeder::class,
            bidangInstasiSeeder::class,
            kegiatanSeeder::class,
            // UsersSeeder::class,
        ]);
    }
}
