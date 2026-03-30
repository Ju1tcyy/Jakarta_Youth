<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Organisasi extends Authenticatable
{
    protected $fillable = [
        'nama_sekolah',
        'nama_organisasi',
        'email_organisasi',
        'password',
        'nomor_wa',
        'alamat',
        'surat_rekomendasi',
        'struktur_kepengurusan',
        'bukti_share_ig',
        'bukti_repost_ig',
        'nilai',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getAuthIdentifierName()
    {
        return 'email_organisasi';
    }

    public function getAuthIdentifier()
    {
        return $this->email_organisasi;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
