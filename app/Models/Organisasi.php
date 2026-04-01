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
        // Nomination fields
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
        'surat_pernyataan_kedisiplinan',
        'google_form_kepuasan_president',
    ];

    protected $casts = [
        'google_form_kepuasan' => 'boolean',
        'google_form_kepuasan_sosial' => 'boolean',
        'google_form_kepuasan_media' => 'boolean',
        'google_form_kepuasan_reels' => 'boolean',
        'google_form_kepuasan_president' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
