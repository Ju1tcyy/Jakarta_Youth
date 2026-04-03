<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Juri - {{ config('app.name', 'Jakarta Youth Achievement Award') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #818cf8;
            --dark: #0f172a;
            --card-shadow: 0 4px 24px rgba(0,0,0,0.07);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; min-height: 100vh; }
        .header {
            background: var(--dark);
            padding: 0 32px;
            height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }
        .header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            background: linear-gradient(120deg,#818cf8,#c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .badge {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 50px;
            padding: 5px 14px;
            color: rgba(255,255,255,0.8);
            font-size: 0.8rem;
            font-weight: 600;
        }
        .badge-juri {
            background: rgba(99,102,241,0.2);
            border: 1px solid rgba(99,102,241,0.4);
            color: #a5b4fc;
            border-radius: 50px;
            padding: 4px 12px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .logout-btn {
            background: rgba(239,68,68,0.15);
            border: none;
            color: #f87171;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }
        .logout-btn:hover { background: rgba(239,68,68,0.3); }
        .container { max-width: 1100px; margin: 0 auto; padding: 36px 24px; }
        .page-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 6px;
        }
        .page-subtitle { color: #64748b; font-size: 0.9rem; margin-bottom: 28px; }
        .stats-row { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; margin-bottom: 28px; }
        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; }
        .stat-icon.purple { background: #ede9fe; color: #7c3aed; }
        .stat-icon.green { background: #dcfce7; color: #16a34a; }
        .stat-icon.orange { background: #ffedd5; color: #ea580c; }
        .stat-icon i { width: 20px; height: 20px; }
        .stat-label { font-size: 0.75rem; color: #64748b; font-weight: 500; margin-bottom: 2px; }
        .stat-value { font-family: 'Outfit', sans-serif; font-size: 1.4rem; font-weight: 800; color: var(--dark); }
        .table-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }
        .table-header {
            padding: 20px 28px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .table-header h3 { font-family: 'Outfit', sans-serif; font-size: 1rem; font-weight: 700; }
        table { width: 100%; border-collapse: collapse; }
        thead th {
            background: #f8fafc;
            padding: 12px 20px;
            text-align: left;
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }
        tbody tr { border-top: 1px solid #f1f5f9; transition: background 0.15s; }
        tbody tr:hover { background: #f8fafc; }
        tbody td { padding: 14px 20px; font-size: 0.875rem; color: #334155; vertical-align: middle; }
        .org-avatar {
            width: 34px; height: 34px;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 0.8rem;
            margin-right: 10px;
            flex-shrink: 0;
        }
        .org-name { font-weight: 600; color: #0f172a; }
        .org-school { font-size: 0.75rem; color: #94a3b8; }
        .badge-status-done {
            background: #dcfce7;
            color: #15803d;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 700;
        }
        .badge-status-pending {
            background: #fef3c7;
            color: #b45309;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 700;
        }
        .btn-nilai {
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: white;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }
        .btn-nilai:hover { opacity: 0.9; transform: translateY(-1px); }
        .btn-edit {
            background: #e0e7ff;
            color: #4f46e5;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }
        .btn-edit:hover { background: #c7d2fe; }
        .kategori-badge {
            background: #f0f9ff;
            color: #0369a1;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .empty-state { text-align: center; padding: 60px 20px; color: #94a3b8; }
        .empty-state i { width: 40px; height: 40px; margin-bottom: 12px; }
        @media(max-width: 768px) {
            .stats-row { grid-template-columns: 1fr; }
            .container { padding: 20px 16px; }
        }
    </style>
</head>
<body>
<div class="header">
    <h1>⚖️ Dashboard Juri</h1>
    <div class="header-right">
        <span class="badge-juri">Juri</span>
        <span class="badge">{{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i data-feather="log-out" style="width:14px;height:14px;"></i> Logout
            </button>
        </form>
    </div>
</div>

<div class="container">
    <div class="page-title">Daftar Peserta</div>
    <div class="page-subtitle">Jakarta Youth Achievement Award 2026 — Berikan penilaian untuk setiap peserta sesuai kategori nominasinya.</div>

    @php
        $totalPeserta = $organisasis->total();
        $sudahDinilai = $organisasis->filter(fn($o) => $o->penilaianByJuri->isNotEmpty())->count();
        $belumDinilai = $organisasis->count() - $sudahDinilai;
    @endphp
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-icon purple"><i data-feather="users"></i></div>
            <div>
                <div class="stat-label">Total Peserta</div>
                <div class="stat-value">{{ $totalPeserta }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green"><i data-feather="check-circle"></i></div>
            <div>
                <div class="stat-label">Sudah Dinilai</div>
                <div class="stat-value">{{ $sudahDinilai }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon orange"><i data-feather="clock"></i></div>
            <div>
                <div class="stat-label">Belum Dinilai</div>
                <div class="stat-value">{{ $belumDinilai }}</div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <i data-feather="award" style="width:18px;height:18px;color:#4f46e5;"></i>
            <h3>Semua Peserta</h3>
        </div>
        @if($organisasis->isEmpty())
            <div class="empty-state">
                <i data-feather="inbox"></i>
                <p>Belum ada peserta terdaftar.</p>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th>Organisasi</th>
                    <th>Kategori Nominasi</th>
                    <th>Status Penilaian</th>
                    <th>Skor Anda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organisasis as $org)
                @php
                    $penilaian = $org->penilaianByJuri->first();
                    $kategori = $org->determined_kategori;
                    $kategoriLabel = match($kategori) {
                        'innovation'    => '🏆 Innovation',
                        'social_impact' => '🤝 Social Impact',
                        'media'         => '📱 Media',
                        'video_reels'   => '🎬 Video Reels',
                        'president'     => '👑 President',
                        default         => '—',
                    };
                @endphp
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;">
                            <div class="org-avatar">{{ substr($org->nama_organisasi,0,1) }}</div>
                            <div>
                                <div class="org-name">{{ $org->nama_organisasi }}</div>
                                <div class="org-school">{{ $org->nama_sekolah }}</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="kategori-badge">{{ $kategoriLabel }}</span></td>
                    <td>
                        @if($penilaian)
                            <span class="badge-status-done">✓ Sudah Dinilai</span>
                        @else
                            <span class="badge-status-pending">⏳ Belum Dinilai</span>
                        @endif
                    </td>
                    <td>
                        @if($penilaian)
                            <span style="font-family:'Outfit',sans-serif;font-weight:800;font-size:1.1rem;color:#4f46e5;">{{ $penilaian->total_skor }}<span style="color:#94a3b8;font-size:0.75rem;">/100</span></span>
                        @else
                            <span style="color:#94a3b8;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($penilaian)
                            <a href="{{ route('juri.show', $org->id) }}" class="btn-edit">
                                <i data-feather="edit-2" style="width:13px;height:13px;"></i> Edit
                            </a>
                        @else
                            <a href="{{ route('juri.show', $org->id) }}" class="btn-nilai">
                                <i data-feather="star" style="width:13px;height:13px;"></i> Nilai
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding:16px 20px;">
            {{ $organisasis->links() }}
        </div>
        @endif
    </div>
</div>

<script>
    feather.replace({ 'width': 18, 'height': 18 });
    @if(session('success'))
        Swal.fire({ icon:'success', title:'Berhasil!', text:'{{ session("success") }}', confirmButtonColor:'#4f46e5', timer:3000 });
    @endif
</script>
</body>
</html>
