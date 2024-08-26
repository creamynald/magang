<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansis';

    protected $fillable = [
        'nama',
        'alamat',
        'kode_pos',
        'laman_web',
        'surel',
    ];

    public function bidangInstansi()
    {
        return $this->hasMany(bidangInstansi::class, 'instansi_id');
    }
}
