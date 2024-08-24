<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidangInstansi extends Model
{
    use HasFactory;

    protected $table = 'bidang_instansis';

    protected $fillable = [
        'instansi_id',
        'nama',
        'nama_penanggung_jawab',
        'nip',
        'telepon',
    ];

    public function instansi()
    {
        return $this->belongsTo(instansi::class);
    }
}
