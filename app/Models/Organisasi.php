<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $fillable = [
        'user_id',
        'nama_sekolah',
        'nama_organisasi',
        'nomor_wa',
        'alamat',
        'surat_rekomendasi',
        'struktur_kepengurusan',
        'buktishare',
        'buktirepost',
        'nilai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
