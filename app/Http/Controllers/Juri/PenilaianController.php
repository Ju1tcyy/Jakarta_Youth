<?php

namespace App\Http\Controllers\Juri;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $organisasis = Organisasi::with(['user', 'penilaianByJuri' => function($q) {
            $q->where('juri_id', Auth::id());
        }])->latest()->paginate(15);

        return view('juri.dashboard', compact('organisasis'));
    }

    public function show($id)
    {
        $organisasi = Organisasi::with('user')->findOrFail($id);
        $penilaian = Penilaian::where('organisasi_id', $id)
            ->where('juri_id', Auth::id())
            ->first();

        return view('juri.peserta', compact('organisasi', 'penilaian'));
    }

    public function store(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $kategori = $request->input('kategori');

        $fields = $this->getFieldsForKategori($kategori);

        $validated = $request->validate(array_merge(
            ['kategori' => 'required|string', 'catatan' => 'nullable|string|max:1000'],
            array_fill_keys($fields, 'required|numeric|min:0|max:100')
        ));

        $totalSkor = $this->hitungTotalSkor($validated, $kategori);

        $data = array_merge($validated, [
            'organisasi_id' => $id,
            'juri_id'       => Auth::id(),
            'total_skor'    => $totalSkor,
        ]);

        Penilaian::updateOrCreate(
            ['organisasi_id' => $id, 'juri_id' => Auth::id()],
            $data
        );

        // Update rata-rata nilai di tabel organisasis
        $avgSkor = Penilaian::where('organisasi_id', $id)->avg('total_skor');
        $organisasi->update(['nilai' => round($avgSkor, 2)]);

        return redirect()->route('juri.show', $id)
            ->with('success', 'Penilaian berhasil disimpan!');
    }

    public function adminStore(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $kategori = $request->input('kategori');
        $fields = $this->getFieldsForKategori($kategori);

        $validated = $request->validate(array_merge(
            ['kategori' => 'required|string', 'catatan' => 'nullable|string|max:1000'],
            array_fill_keys($fields, 'required|numeric|min:0|max:100')
        ));

        $totalSkor = $this->hitungTotalSkor($validated, $kategori);

        $data = array_merge($validated, [
            'organisasi_id' => $id,
            'juri_id'       => Auth::id(),
            'total_skor'    => $totalSkor,
        ]);

        Penilaian::updateOrCreate(
            ['organisasi_id' => $id, 'juri_id' => Auth::id()],
            $data
        );

        $avgSkor = Penilaian::where('organisasi_id', $id)->avg('total_skor');
        $organisasi->update(['nilai' => round($avgSkor, 2)]);

        return redirect()->route('sekolah.show', $id)
            ->with('success', 'Penilaian berhasil disimpan!');
    }

    private function getFieldsForKategori(string $kategori): array
    {
        return match($kategori) {
            'innovation'   => ['skor_inovasi_kreativitas','skor_dampak','skor_efektivitas','skor_konsistensi','skor_keterlibatan','skor_kemitraan'],
            'social_impact'=> ['skor_si_dampak','skor_si_relevansi','skor_si_keberlanjutan','skor_si_data','skor_si_kreativitas','skor_si_keterlibatan','skor_si_kemitraan','skor_si_empati'],
            'media'        => ['skor_me_performa','skor_me_data','skor_me_konsistensi','skor_me_konten','skor_me_visual','skor_me_interaksi','skor_me_kelengkapan'],
            'video_reels'  => ['skor_vr_popularitas','skor_vr_konten','skor_vr_tema','skor_vr_kelengkapan','skor_vr_visual','skor_vr_kepatuhan'],
            'president'    => ['skor_pr_kepemimpinan','skor_pr_inovasi','skor_pr_problem_solving','skor_pr_branding','skor_pr_portofolio','skor_pr_video','skor_pr_validasi','skor_pr_berkas'],
            default        => [],
        };
    }

    private function hitungTotalSkor(array $data, string $kategori): float
    {
        $bobot = match($kategori) {
            'innovation' => [
                'skor_inovasi_kreativitas' => 0.30,
                'skor_dampak'              => 0.20,
                'skor_efektivitas'         => 0.15,
                'skor_konsistensi'         => 0.15,
                'skor_keterlibatan'        => 0.10,
                'skor_kemitraan'           => 0.10,
            ],
            'social_impact' => [
                'skor_si_dampak'        => 0.25,
                'skor_si_relevansi'     => 0.15,
                'skor_si_keberlanjutan' => 0.15,
                'skor_si_data'          => 0.15,
                'skor_si_kreativitas'   => 0.10,
                'skor_si_keterlibatan'  => 0.08,
                'skor_si_kemitraan'     => 0.07,
                'skor_si_empati'        => 0.05,
            ],
            'media' => [
                'skor_me_performa'    => 0.25,
                'skor_me_data'        => 0.15,
                'skor_me_konsistensi' => 0.15,
                'skor_me_konten'      => 0.15,
                'skor_me_visual'      => 0.10,
                'skor_me_interaksi'   => 0.10,
                'skor_me_kelengkapan' => 0.10,
            ],
            'video_reels' => [
                'skor_vr_popularitas' => 0.60,
                'skor_vr_konten'      => 0.15,
                'skor_vr_tema'        => 0.10,
                'skor_vr_kelengkapan' => 0.05,
                'skor_vr_visual'      => 0.05,
                'skor_vr_kepatuhan'   => 0.05,
            ],
            'president' => [
                'skor_pr_kepemimpinan'   => 0.25,
                'skor_pr_inovasi'        => 0.15,
                'skor_pr_problem_solving'=> 0.15,
                'skor_pr_branding'       => 0.10,
                'skor_pr_portofolio'     => 0.10,
                'skor_pr_video'          => 0.10,
                'skor_pr_validasi'       => 0.10,
                'skor_pr_berkas'         => 0.05,
            ],
            default => [],
        };

        $total = 0;
        foreach ($bobot as $field => $pct) {
            $total += ($data[$field] ?? 0) * $pct;
        }
        return round($total, 2);
    }
}
