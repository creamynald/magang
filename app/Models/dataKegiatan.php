<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKegiatan extends Model
{
    use HasFactory;

    protected $table = 'data_kegiatans';

    protected $fillable = [
        'user_id',
        'instansi_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'dok_pengajuan',
        'status',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
