<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'nama',
        'instansi_id',
        'user_id',
        'periode_akademik',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
