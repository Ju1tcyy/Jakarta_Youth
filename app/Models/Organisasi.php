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
        'nilai_innovation',
        'nilai_social_impact',
        'nilai_media',
        'nilai_video_reels',
        'nilai_president',
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

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function penilaianByJuri()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function getDeterminedKategoriAttribute(): string
    {
        if ($this->portofolio_program_kerja || $this->google_form_kepuasan) return 'innovation';
        if ($this->portofolio_kegiatan_sosial || $this->google_form_kepuasan_sosial) return 'social_impact';
        if ($this->portofolio_sosial_media || $this->google_form_kepuasan_media) return 'media';
        if ($this->link_instagram_reels || $this->google_form_kepuasan_reels) return 'video_reels';
        if ($this->pas_foto_formal || $this->curriculum_vitae) return 'president';
        return '';
    }
}
