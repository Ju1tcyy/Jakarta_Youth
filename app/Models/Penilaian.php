<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'organisasi_id', 'juri_id', 'kategori', 'catatan',

        // Innovation
        'skor_inovasi_kreativitas', 'skor_dampak', 'skor_efektivitas',
        'skor_konsistensi', 'skor_keterlibatan', 'skor_kemitraan',

        // Social Impact
        'skor_si_dampak', 'skor_si_relevansi', 'skor_si_keberlanjutan',
        'skor_si_data', 'skor_si_kreativitas', 'skor_si_keterlibatan',
        'skor_si_kemitraan', 'skor_si_empati',

        // Media
        'skor_me_performa', 'skor_me_data', 'skor_me_konsistensi',
        'skor_me_konten', 'skor_me_visual', 'skor_me_interaksi',
        'skor_me_kelengkapan',

        // Video Reels
        'skor_vr_popularitas', 'skor_vr_konten', 'skor_vr_tema',
        'skor_vr_kelengkapan', 'skor_vr_visual', 'skor_vr_kepatuhan',

        // President
        'skor_pr_kepemimpinan', 'skor_pr_inovasi', 'skor_pr_problem_solving',
        'skor_pr_branding', 'skor_pr_portofolio', 'skor_pr_video',
        'skor_pr_validasi', 'skor_pr_berkas',

        'total_skor',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function juri()
    {
        return $this->belongsTo(User::class, 'juri_id');
    }
}
