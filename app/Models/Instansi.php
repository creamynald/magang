<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansis';

    protected $fillable = ['nama_instansi', 'nama_kegiatan', 'user_id', 'alamat', 'laman_web', 'surel', 'telp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
