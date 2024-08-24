<?php

namespace Database\Seeders\dataDemo;

use App\Models\bidangInstansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bidangInstasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        bidangInstansi::insert([
            [
                'instansi_id' => 1,
                'nama' => 'Bidang Pengelolaan Berbasis Elektronik',
                'nama_penanggung_jawab' => 'Zulkifli, ST.',
                'nip' => '1932 12312 3412 1231',
                'telepon' => '085263211231',
                'is_active' => true,
            ],
            [
                'instansi_id' => 1,
                'nama' => 'Bidang Statistik & Persandian',
                'nama_penanggung_jawab' => 'Azmar',
                'nip' => '3112 12312 3412 1231',
                'telepon' => '312312312312',
                'is_active' => false,
            ],
            [
                'instansi_id' => 2,
                'nama' => 'Bidang Layanan Kesehatan',
                'nama_penanggung_jawab' => 'Deden Sanjaya',
                'nip' => '-',
                'telepon' => '085263211231',
                'is_active' => true,
            ],
        ]);
    }
}
