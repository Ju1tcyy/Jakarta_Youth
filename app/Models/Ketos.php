<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Ketos extends Authenticatable
{
    protected $fillable = [
        'user_id',
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
        'nilai_innovation',
        'nilai_social_impact',
        'nilai_media',
        'nilai_video_reels',
        'nilai_president',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'google_form_kepuasan' => 'boolean',
        'google_form_kepuasan_sosial' => 'boolean',
        'google_form_kepuasan_media' => 'boolean',
        'google_form_kepuasan_reels' => 'boolean',
        'google_form_kepuasan_president' => 'boolean',
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
