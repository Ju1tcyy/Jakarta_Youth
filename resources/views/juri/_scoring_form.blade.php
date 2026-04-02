{{--
Partial: _scoring_form.blade.php
Variables needed:
$organisasi - Organisasi model
$penilaian - existing Penilaian|null
$formAction - route string for POST
$backUrl - url to go back
--}}
@php
    $kategori = $organisasi->determined_kategori;
    $old = $penilaian ?? null;
    $v = fn($field) => old($field, $old?->$field ?? 80);

    $criterias = match ($kategori) {
        'innovation' => [
            ['field' => 'skor_inovasi_kreativitas', 'label' => 'Inovasi & Kreativitas Program', 'pct' => 30, 'desc' => 'Tingkat kebaruan, keunikan, dan kreativitas program kerja yang dijalankan.'],
            ['field' => 'skor_dampak', 'label' => 'Dampak Program', 'pct' => 20, 'desc' => 'Besar serta keberlanjutan dampak program terhadap siswa, sekolah, dan lingkungan.'],
            ['field' => 'skor_efektivitas', 'label' => 'Efektivitas Program', 'pct' => 15, 'desc' => 'Tingkat kesesuaian antara tujuan awal program dengan hasil yang dicapai.'],
            ['field' => 'skor_konsistensi', 'label' => 'Konsistensi & Keberlanjutan Program', 'pct' => 15, 'desc' => 'Konsistensi pelaksanaan program jangka pendek, menengah, dan panjang.'],
            ['field' => 'skor_keterlibatan', 'label' => 'Keterlibatan Anggota OSIS', 'pct' => 10, 'desc' => 'Tingkat partisipasi aktif dan kontribusi anggota OSIS.'],
            ['field' => 'skor_kemitraan', 'label' => 'Kemitraan & Kolaborasi', 'pct' => 10, 'desc' => 'Keterlibatan pihak eksternal dalam mendukung keberhasilan program.'],
        ],
        'social_impact' => [
            ['field' => 'skor_si_dampak', 'label' => 'Dampak & Manfaat Program', 'pct' => 25, 'desc' => 'Besarnya manfaat yang dirasakan penerima program.'],
            ['field' => 'skor_si_relevansi', 'label' => 'Relevansi Program', 'pct' => 15, 'desc' => 'Kesesuaian program dengan kebutuhan sosial di lingkungan sekolah/masyarakat.'],
            ['field' => 'skor_si_keberlanjutan', 'label' => 'Keberlanjutan & Pengembangan Program', 'pct' => 15, 'desc' => 'Potensi program untuk terus dikembangkan.'],
            ['field' => 'skor_si_data', 'label' => 'Kualitas Data & Pembuktian Dampak', 'pct' => 15, 'desc' => 'Kelengkapan data kuantitatif serta bukti pendukung.'],
            ['field' => 'skor_si_kreativitas', 'label' => 'Kreativitas Program Sosial', 'pct' => 10, 'desc' => 'Inovasi dan kreativitas dalam merancang kegiatan sosial.'],
            ['field' => 'skor_si_keterlibatan', 'label' => 'Keterlibatan Pengurus OSIS', 'pct' => 8, 'desc' => 'Tingkat partisipasi aktif seluruh anggota OSIS.'],
            ['field' => 'skor_si_kemitraan', 'label' => 'Kemitraan & Kolaborasi', 'pct' => 7, 'desc' => 'Kemampuan membangun kerja sama dengan pihak eksternal.'],
            ['field' => 'skor_si_empati', 'label' => 'Nilai Kepedulian & Empati', 'pct' => 5, 'desc' => 'Nilai kemanusiaan dan empati yang tercermin dalam program.'],
        ],
        'media' => [
            ['field' => 'skor_me_performa', 'label' => 'Performa & Engagement Akun', 'pct' => 25, 'desc' => 'Kualitas performa akun dilihat dari followers, reach, views, likes, komentar.'],
            ['field' => 'skor_me_data', 'label' => 'Kualitas Data & Validitas Statistik', 'pct' => 15, 'desc' => 'Kelengkapan serta keakuratan data statistik yang ditampilkan.'],
            ['field' => 'skor_me_konsistensi', 'label' => 'Konsistensi & Aktivitas Akun', 'pct' => 15, 'desc' => 'Konsistensi frekuensi posting dan keberlanjutan aktivitas akun.'],
            ['field' => 'skor_me_konten', 'label' => 'Kualitas Konten', 'pct' => 15, 'desc' => 'Keberagaman dan kualitas konten yang ditampilkan.'],
            ['field' => 'skor_me_visual', 'label' => 'Visual & Branding', 'pct' => 10, 'desc' => 'Konsistensi tampilan feed, warna, desain visual, dan identitas akun.'],
            ['field' => 'skor_me_interaksi', 'label' => 'Interaksi & Keterlibatan Audiens', 'pct' => 10, 'desc' => 'Kemampuan membangun komunikasi dua arah.'],
            ['field' => 'skor_me_kelengkapan', 'label' => 'Kelengkapan Profil & Struktur Akun', 'pct' => 10, 'desc' => 'Kerapihan profil, bio, highlight, dan struktur konten.'],
        ],
        'video_reels' => [
            ['field' => 'skor_vr_popularitas', 'label' => 'Popularitas & Dukungan Publik', 'pct' => 60, 'desc' => 'Jumlah likes dan komentar organik pada postingan video.'],
            ['field' => 'skor_vr_konten', 'label' => 'Kualitas Konten Video', 'pct' => 15, 'desc' => 'Kejelasan pesan, kreativitas, alur storytelling.'],
            ['field' => 'skor_vr_tema', 'label' => 'Kesesuaian Tema', 'pct' => 10, 'desc' => 'Tingkat keterkaitan isi video dengan tema yang ditentukan.'],
            ['field' => 'skor_vr_kelengkapan', 'label' => 'Kelengkapan Konten', 'pct' => 5, 'desc' => 'Kelengkapan elemen wajib dalam video.'],
            ['field' => 'skor_vr_visual', 'label' => 'Kualitas Visual & Editing', 'pct' => 5, 'desc' => 'Kerapihan editing, kualitas audio-visual.'],
            ['field' => 'skor_vr_kepatuhan', 'label' => 'Kepatuhan terhadap Ketentuan', 'pct' => 5, 'desc' => 'Kesesuaian dengan seluruh aturan.'],
        ],
        'president' => [
            ['field' => 'skor_pr_kepemimpinan', 'label' => 'Kepemimpinan & Dampak Nyata', 'pct' => 25, 'desc' => 'Kemampuan memimpin organisasi dan bukti nyata kontribusi.'],
            ['field' => 'skor_pr_inovasi', 'label' => 'Inovasi Program', 'pct' => 15, 'desc' => 'Tingkat kebaruan, kreativitas, dan keunikan program kerja.'],
            ['field' => 'skor_pr_problem_solving', 'label' => 'Problem Solving & Critical Thinking', 'pct' => 15, 'desc' => 'Ketajaman analisis dan kualitas solusi dalam esai.'],
            ['field' => 'skor_pr_branding', 'label' => 'Personal Branding & Komunikasi', 'pct' => 10, 'desc' => 'Kemampuan membangun citra diri yang positif dan komunikatif.'],
            ['field' => 'skor_pr_portofolio', 'label' => 'Kualitas Portofolio', 'pct' => 10, 'desc' => 'Kelengkapan, kejelasan, dan kekuatan data dalam portofolio.'],
            ['field' => 'skor_pr_video', 'label' => 'Kualitas Video Profil', 'pct' => 10, 'desc' => 'Penyajian video yang komunikatif, terstruktur, dan menarik.'],
            ['field' => 'skor_pr_validasi', 'label' => 'Validasi & Kredibilitas', 'pct' => 10, 'desc' => 'Bukti pendukung: surat rekomendasi, rapor, konsistensi data.'],
            ['field' => 'skor_pr_berkas', 'label' => 'Kelengkapan & Kepatuhan Berkas', 'pct' => 5, 'desc' => 'Kesesuaian seluruh berkas dengan ketentuan.'],
        ],
        default => [],
    };

    $kategoriLabel = match ($kategori) {
        'innovation' => 'Outstanding Student Council Innovation',
        'social_impact' => 'Leading Student Council Social Impact',
        'media' => 'Next-Level Student Council Media',
        'video_reels' => "People's Choice Student Council - DK Jakarta",
        'president' => 'Student Council President of the Year 2026',
        default => 'Kategori Belum Ditentukan',
    };
@endphp

@if($kategori)
    <div class="scoring-wrapper">
        <div class="scoring-header">
            <div class="scoring-icon">
                <i data-feather="star"></i>
            </div>
            <div>
                <h3 class="scoring-title">Form Penilaian Juri</h3>
                <p class="scoring-subtitle">{{ $kategoriLabel }}</p>
            </div>
            @if($old)
                <span class="scoring-existing-badge">✓ Sudah Pernah Dinilai</span>
            @endif
        </div>

        <div class="scoring-live-total">
            <span class="live-label">Total Skor Sementara</span>
            <span class="live-score" id="live-total">{{ $old?->total_skor ?? '0.00' }}</span>
            <span class="live-max">/100</span>
        </div>

        <form action="{{ $formAction }}" method="POST" id="scoring-form">
            @csrf
            <input type="hidden" name="kategori" value="{{ $kategori }}">

            @if($errors->any())
                <div
                    style="background:#fee2e2;border-left:4px solid #ef4444;padding:12px 16px;border-radius:10px;margin-bottom:20px;font-size:0.875rem;color:#991b1b;">
                    @foreach($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="criteria-grid">
                @foreach($criterias as $c)
                    <div class="criteria-card">
                        <div class="criteria-top">
                            <div class="criteria-info">
                                <span class="criteria-label">{{ $c['label'] }}</span>
                                <span class="criteria-desc">{{ $c['desc'] }}</span>
                            </div>
                            <span class="criteria-pct">{{ $c['pct'] }}%</span>
                        </div>
                        <div class="slider-row">
                            <input type="range" name="{{ $c['field'] }}" id="{{ $c['field'] }}" min="0" max="100" step="1"
                                value="{{ $v($c['field']) }}" class="criteria-slider" data-bobot="{{ $c['pct'] / 100 }}"
                                oninput="updateScore(this)">
                            <span class="slider-val" id="val_{{ $c['field'] }}">{{ $v($c['field']) }}</span>
                        </div>
                        <div class="weighted-display">
                            Bobot kontribusi: <strong
                                id="w_{{ $c['field'] }}">{{ round($v($c['field']) * $c['pct'] / 100, 2) }}</strong> poin
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="criteria-card" style="margin-top:16px;">
                <label class="criteria-label">Catatan (opsional)</label>
                <textarea name="catatan" rows="3" placeholder="Masukkan catatan tambahan untuk peserta ini..."
                    style="width:100%;padding:10px;border:1.5px solid #e2e8f0;border-radius:10px;font-family:inherit;font-size:0.875rem;resize:vertical;margin-top:8px;">{{ old('catatan', $old?->catatan) }}</textarea>
            </div>

            <div class="scoring-actions">
                <a href="{{ $backUrl }}" class="btn-back">
                    <i data-feather="arrow-left" style="width:14px;height:14px;"></i> Batal
                </a>
                <button type="submit" class="btn-submit" id="submit-btn">
                    <i data-feather="save" style="width:14px;height:14px;"></i>
                    {{ $old ? 'Perbarui Penilaian' : 'Simpan Penilaian' }}
                </button>
            </div>
        </form>
    </div>

    <style>
        .scoring-wrapper {
            background: #fff;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
            border: 1px solid rgba(0, 0, 0, 0.03);
            margin-top: 24px;
        }

        .scoring-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .scoring-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #fef3c7, #ffedd5);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d97706;
            flex-shrink: 0;
        }

        .scoring-icon i {
            width: 20px;
            height: 20px;
        }

        .scoring-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            margin: 0 0 3px;
        }

        .scoring-subtitle {
            font-size: 0.8rem;
            color: #64748b;
            margin: 0;
        }

        .scoring-existing-badge {
            margin-left: auto;
            background: #dcfce7;
            color: #15803d;
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .scoring-live-total {
            display: flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #1e293b, #312e81);
            border-radius: 14px;
            padding: 16px 24px;
            margin-bottom: 24px;
        }

        .live-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .live-score {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: #a5b4fc;
            margin-left: auto;
        }

        .live-max {
            color: rgba(255, 255, 255, 0.4);
            font-size: 1rem;
            align-self: flex-end;
            padding-bottom: 4px;
        }

        .criteria-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .criteria-card {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px 18px;
            transition: border-color 0.2s;
        }

        .criteria-card:focus-within {
            border-color: #6366f1;
        }

        .criteria-top {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
        }

        .criteria-info {
            flex: 1;
        }

        .criteria-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 3px;
        }

        .criteria-desc {
            font-size: 0.75rem;
            color: #64748b;
            line-height: 1.4;
        }

        .criteria-pct {
            flex-shrink: 0;
            background: #eef2ff;
            color: #4f46e5;
            font-weight: 800;
            font-size: 0.8rem;
            padding: 3px 10px;
            border-radius: 8px;
        }

        .slider-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .criteria-slider {
            flex: 1;
            -webkit-appearance: none;
            height: 6px;
            border-radius: 4px;
            background: #e2e8f0;
            outline: none;
            cursor: pointer;
        }

        .criteria-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #4f46e5;
            box-shadow: 0 2px 6px rgba(79, 70, 229, 0.4);
            cursor: pointer;
            transition: transform 0.15s;
        }

        .criteria-slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
        }

        .slider-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            color: #4f46e5;
            min-width: 38px;
            text-align: right;
        }

        .weighted-display {
            font-size: 0.72rem;
            color: #94a3b8;
            margin-top: 6px;
        }

        .scoring-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 11px 22px;
            border-radius: 10px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-back:hover {
            background: #e2e8f0;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 28px;
            border-radius: 10px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.35);
            transition: all 0.2s;
        }

        .btn-submit:hover {
            opacity: 0.92;
            transform: translateY(-2px);
        }
    </style>

    <script>
        function updateScore(el) {
            const field = el.id;
            const val = parseInt(el.value);
            const bobot = parseFloat(el.dataset.bobot);

            document.getElementById('val_' + field).textContent = val;
            document.getElementById('w_' + field).textContent = (val * bobot).toFixed(2);

            // Recalculate total
            let total = 0;
            document.querySelectorAll('.criteria-slider').forEach(s => {
                total += parseInt(s.value) * parseFloat(s.dataset.bobot);
            });
            document.getElementById('live-total').textContent = total.toFixed(2);

            // Color the slider track
            const pct = (val / 100) * 100;
            el.style.background = `linear-gradient(to right, #4f46e5 ${pct}%, #e2e8f0 ${pct}%)`;
        }

        // Initialize slider tracks on load
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.criteria-slider').forEach(s => {
                updateScore(s);
            });
        });
    </script>
@else
    <div
        style="background:#f8fafc;border:2px dashed #e2e8f0;border-radius:16px;padding:32px;text-align:center;margin-top:24px;">
        <p style="color:#94a3b8;font-size:0.9rem;">⚠️ Peserta ini belum memilih kategori nominasi. Form penilaian akan
            muncul setelah peserta mengisi nominasi.</p>
    </div>
@endif