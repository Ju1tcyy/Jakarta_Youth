<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Ketos extends Authenticatable
{
    protected $fillable = [
        'nama',
        'asal_sekolah',
        'email',
        'password',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_wa',
        'portofolio_program_kerja',
        'google_form_kepuasan',
        'portofolio_kegiatan_sosial',
        'google_form_kepuasan_sosial',
        'portofolio_sosial_media',
        'google_form_kepuasan_media',
        'link_instagram_reels',
        'google_form_kepuasan_reels',
        'pas_foto_formal',
        'curriculum_vitae',
        'fotokopi_rapor',
        'video_profil_jakarta',
        'portofolio_inovasi',
        'esai_solusi_kepemimpinan',
        'google_form_kepuasan_president',
        'surat_pernyataan_kedisiplinan',
        'nilai',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
