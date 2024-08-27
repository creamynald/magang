<?php

namespace Database\Seeders\dataDemo;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kegiatan::insert([
            [
                'nama' => 'Kerja Praktek/PKL',
                'instansi_id' => 1,
                'periode_akademik' => '2024',
                'tanggal_mulai' => '2023-08-01',
                'tanggal_selesai' => '2023-08-31',
                'user_id' => 1,
                'is_active' => true,
            ],

        ]);
    }
}
