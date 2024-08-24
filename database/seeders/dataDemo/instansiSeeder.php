<?php

namespace Database\Seeders\dataDemo;

use App\Models\Instansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class instansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instansi::insert([
            [
                'nama' => 'Dinas Komunikasi, Informatika dan Statistik',
                'alamat' => 'Jl. Kartini Nomor 12, Bengkalis',
                'kode_pos' => '28712',
                'laman_web' => 'diskomintoik.bengkaliskab.go.id',
                'surel' => 'diskomintoik@bengkaliskab.go.id',
                'is_active' => true,
            ],
            [
                'nama' => 'Dinas Kesehatan',
                'alamat' => 'Jl. Pertanian No. 6 Bengkalis',
                'kode_pos' => '28712',
                'laman_web' => 'dinkes.bengkaliskab.go.id',
                'surel' => 'info@dinkes.bengkaliskab.go.id',
                'is_active' => false,
            ],
        ]);
    }
}
