<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'nama_organisasi',
        'email_organisasi',
        'nomor_wa',
        'alamat',
        'nilai',
    ];
}
