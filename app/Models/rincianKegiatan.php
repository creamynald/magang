<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rincianKegiatan extends Model
{
    use HasFactory;

    protected $table = 'rincian_kegiatans';

    protected $fillable = [
        'kegiatan_id',
        'tanggal_kegiatan',
        'topik',
        'deskripsi',
        'link',
        'lampiran',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(kegiatan::class, 'kegiatan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
