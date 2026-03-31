<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin, ketos, organisasi
        'nomor_wa',
        'asal_sekolah',
        'tempat_lahir',
        'tanggal_lahir',
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
        'nama_organisasi',
        'alamat',
        'surat_rekomendasi',
        'struktur_kepengurusan',
        'bukti_share_ig',
        'bukti_repost_ig',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'tanggal_lahir' => 'date',
        ];
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isKetos()
    {
        return $this->role === 'ketos';
    }

    public function isOrganisasi()
    {
        return $this->role === 'organisasi';
    }
}
