<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ketos extends Model
{
    protected $fillable = [
        'nama',
        'asal_sekolah',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_wa',
        'nilai',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
