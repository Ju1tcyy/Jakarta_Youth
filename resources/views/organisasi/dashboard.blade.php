<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Organisasi - Youth Generation</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap');

        :root {
            --primary: #e53e3e;
            --secondary: #dd6b20;
            --accent: #f6ad55;
            --dark: #0f172a;
            --dark2: #1e293b;
            --light: #f1f5f9;
            --white: #ffffff;
            --text-main: #334155;
            --text-muted: #64748b;
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Inter', sans-serif;
            --sidebar-bg: #0f172a;
            --sidebar-active: rgba(229,62,62,0.15);
            --sidebar-hover: rgba(255,255,255,0.06);
            --glass-bg: rgba(255,255,255,0.95);
            --card-shadow: 0 4px 24px rgba(0,0,0,0.07);
            --transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: var(--font-body);
            background: #f1f5f9;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1,h2,h3,h4,h5,h6 { font-family: var(--font-heading); color: var(--dark); }

        /* ── TOP HEADER ── */
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
        .header .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .header .logo img { height: 38px; width: auto; }
        .header h1 {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(120deg,#f87171,#fb923c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .header-badge {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 50px;
            padding: 6px 16px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .header-badge .name {
            font-size: 0.875rem;
            font-weight: 600;
            color: #fff;
            font-family: var(--font-heading);
        }
        .header-badge .school {
            font-size: 0.72rem;
            color: rgba(255,255,255,0.5);
        }

        /* ── MAIN LAYOUT ── */
        .main-container {
            display: flex;
            flex: 1;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 64px;
            height: calc(100vh - 64px);
            overflow-y: auto;
        }
        .sidebar-header {
            padding: 28px 24px 12px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-header h3 {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.35);
            font-weight: 700;
        }
        .sidebar-menu { list-style: none; padding: 12px 0; flex: 1; }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 24px;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            border-radius: 0;
            transition: var(--transition);
            border-left: 3px solid transparent;
            margin-bottom: 2px;
        }
        .sidebar-menu a i { width: 18px; height: 18px; flex-shrink: 0; }
        .sidebar-menu a:hover {
            background: var(--sidebar-hover);
            color: #fff;
        }
        .sidebar-menu a.active {
            background: var(--sidebar-active);
            color: #f87171;
            border-left-color: #f87171;
            font-weight: 600;
        }
        .sidebar-menu a.active i { color: #f87171; }
        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .user-profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .user-info-sidebar .name {
            font-weight: 600;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.85);
        }
        .user-info-sidebar .school {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.4);
        }
        .btn-logout-sidebar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(239,68,68,0.15);
            color: #f87171;
            transition: var(--transition);
        }
        .btn-logout-sidebar:hover {
            background: #ef4444;
            color: #fff;
            transform: scale(1.05);
        }

        /* ── CONTENT ── */
        .content-area {
            flex: 1;
            padding: 36px;
            max-width: calc(100vw - 260px);
            overflow-x: hidden;
        }
        .content-section { display: none; animation: fadeIn 0.35s ease forwards; }
        .content-section.active { display: block; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── HERO BANNER ── */
        .hero-banner {
            background: linear-gradient(135deg,#1e293b 0%,#7f1d1d 50%,#c2410c 100%);
            border-radius: 20px;
            padding: 36px 40px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            color: #fff;
        }
        .hero-banner::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 250px; height: 250px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }
        .hero-banner::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -40px;
            width: 300px; height: 300px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
        }
        .hero-banner h2 {
            font-size: 1.9rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 6px;
        }
        .hero-banner h2 span { color: #fb923c; }
        .hero-banner p { color: rgba(255,255,255,0.65); font-size: 0.95rem; }
        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(251,146,60,0.2);
            border: 1px solid rgba(251,146,60,0.3);
            color: #fb923c;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── STAT CARDS ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 18px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 22px 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.03);
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,0.1); }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .stat-icon.red { background: #fee2e2; color: #ef4444; }
        .stat-icon.orange { background: #ffedd5; color: #f97316; }
        .stat-icon.green { background: #dcfce7; color: #22c55e; }
        .stat-icon i { width: 22px; height: 22px; }
        .stat-info .label { font-size: 0.78rem; color: var(--text-muted); font-weight: 500; margin-bottom: 3px; }
        .stat-info .value { font-size: 1.5rem; font-weight: 800; color: var(--dark); font-family: var(--font-heading); }
        .stat-info .sub { font-size: 0.75rem; color: #22c55e; font-weight: 500; }

        /* ── SECTION CARDS ── */
        .section-card {
            background: var(--white);
            padding: 30px;
            border-radius: 18px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(0,0,0,0.03);
            margin-bottom: 24px;
        }
        .section-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f1f5f9;
        }
        .section-card-header .icon-wrap {
            width: 40px; height: 40px;
            background: linear-gradient(135deg,#fee2e2,#ffedd5);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ef4444;
        }
        .section-card-header .icon-wrap i { width: 18px; height: 18px; }
        .section-card-header h3 { font-size: 1.1rem; font-weight: 700; margin: 0; }
        .section-card-header p { font-size: 0.8rem; color: var(--text-muted); margin: 2px 0 0; }

        /* ── DOCUMENT CARDS ── */
        .documents-section {
            background: var(--white);
            padding: 28px;
            border-radius: 18px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(0,0,0,0.03);
            margin-bottom: 24px;
        }
        .documents-section h3 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap: 18px;
            margin-top: 20px;
        }
        .document-card {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 22px;
            transition: var(--transition);
        }
        .document-card:hover {
            border-color: rgba(229,62,62,0.25);
            box-shadow: 0 4px 18px rgba(229,62,62,0.08);
            transform: translateY(-2px);
        }
        .document-card.completed {
            border-color: #86efac;
            background: linear-gradient(135deg,#f0fdf4,#f8fafc);
        }
        .document-card h4 { font-size: 1rem; margin-bottom: 10px; }
        .document-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .document-status.pending { background: #fef3c7; color: #b45309; }
        .document-status.completed { background: #dcfce7; color: #15803d; }
        .document-status i { width: 13px; height: 13px; }

        /* ── FORM ELEMENTS ── */
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 7px; color: var(--text-main); font-weight: 500; font-size: 0.875rem; }
        input[type="file"], input[type="url"], input[type="text"] {
            width: 100%;
            padding: 10px 14px;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            background: var(--white);
            cursor: pointer;
            transition: var(--transition);
            font-family: var(--font-body);
            font-size: 0.875rem;
        }
        input[type="file"]:hover, input[type="url"]:hover, input[type="text"]:hover { border-color: #f87171; }
        input[type="url"], input[type="text"] { border-style: solid; cursor: text; }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            background: #eff6ff;
            border-radius: 10px;
            border: 1px solid #dbeafe;
            margin-top: 10px;
        }
        .checkbox-group input[type="checkbox"] { width: 18px; height: 18px; accent-color: #ef4444; cursor: pointer; }
        .checkbox-group label { margin: 0; cursor: pointer; font-size: 0.875rem; }

        /* ── BUTTONS ── */
        .btn {
            background: linear-gradient(135deg,#e53e3e 0%,#dd6b20 100%);
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            transition: var(--transition);
            font-family: var(--font-heading);
            font-size: 0.95rem;
            box-shadow: 0 4px 14px rgba(229,62,62,0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(229,62,62,0.45); }
        .file-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #ef4444;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 12px;
            padding: 7px 12px;
            background: #fee2e2;
            border-radius: 8px;
            transition: var(--transition);
        }
        .file-link:hover { background: #fecaca; }
        small { display: block; color: var(--text-muted); font-size: 0.76rem; margin-top: 5px; }
        .note-box {
            background: #fff7ed;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 12px;
            border-left: 4px solid #f97316;
            font-size: 0.85rem;
            color: #7c3a00;
        }
        .welcome-card {
            background: var(--white);
            padding: 30px;
            border-radius: 18px;
            box-shadow: var(--card-shadow);
            margin-bottom: 24px;
            border: 1px solid rgba(0,0,0,0.03);
            position: relative;
            overflow: hidden;
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 4px; height: 100%;
            background: linear-gradient(to bottom,#ef4444,#f97316);
        }

        @media (max-width: 900px) {
            .stats-row { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 768px) {
            .main-container { flex-direction: column; }
            .sidebar { width: 100%; height: auto; position: relative; top: auto; }
            .sidebar-menu { display: flex; overflow-x: auto; scrollbar-width: none; }
            .sidebar-menu a { padding: 12px 16px; border-left: none; border-bottom: 3px solid transparent; white-space: nowrap; }
            .sidebar-menu a.active { border-left: none; border-bottom-color: #f87171; }
            .content-area { padding: 20px; max-width: 100%; }
            .header { padding: 0 20px; }
            .stats-row { grid-template-columns: 1fr; }
            .documents-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset('icon/logo_collab.png') }}" alt="Logo">
            <h1>Jakarta Youth</h1>
        </div>
        <div class="header-right">
            <div class="header-badge">
                <span class="name">{{ $organisasi->nama_organisasi }}</span>
                <span class="school">{{ $organisasi->nama_sekolah }}</span>
            </div>
        </div>
    </div>

    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Menu Dashboard</h3>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" onclick="showSection('dashboard')" class="menu-item active" data-section="dashboard"><i data-feather="grid"></i> Dashboard</a></li>
                <li><a href="#" onclick="showSection('documents')" class="menu-item" data-section="documents"><i data-feather="upload-cloud"></i> Upload Dokumen</a></li>
                <li><a href="#" onclick="showSection('nominations')" class="menu-item" data-section="nominations"><i data-feather="award"></i> Nominasi</a></li>
                <li><a href="#" onclick="showSection('profile')" class="menu-item" data-section="profile"><i data-feather="info"></i> Informasi</a></li>
            </ul>
            
            <!-- Sidebar Footer with User Profile and Logout -->
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-info-sidebar">
                        <div class="name">{{ $organisasi->nama_organisasi }}</div>
                        <div class="school">{{ $organisasi->nama_sekolah }}</div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout-sidebar" title="Logout" style="border: none; background: none; cursor: pointer;">
                            <i data-feather="log-out" style="width:16px;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Dashboard Section -->
            <div id="dashboard" class="content-section active">
                <!-- Hero Banner -->
                <div class="hero-banner">
                    <div class="hero-tag"><i data-feather="award" style="width:12px;height:12px;"></i> Jakarta Youth Achievement Award 2026</div>
                    <h2>Selamat Datang, <span>{{ $organisasi->nama_organisasi }}!</span></h2>
                    <p>Pantau kelengkapan dokumen dan status nominasi Anda melalui dashboard ini.</p>
                </div>

                @php
                    $docsTotal = 4;
                    $docsDone = ($organisasi->surat_rekomendasi ? 1 : 0) + ($organisasi->struktur_kepengurusan ? 1 : 0) + ($organisasi->buktishare ? 1 : 0) + ($organisasi->buktirepost ? 1 : 0);
                @endphp
                <!-- Stat Cards -->
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon red"><i data-feather="file-text"></i></div>
                        <div class="stat-info">
                            <div class="label">Dokumen Lengkap</div>
                            <div class="value">{{ $docsDone }}/{{ $docsTotal }}</div>
                            <div class="sub">{{ $docsDone == $docsTotal ? '✓ Semua lengkap!' : ($docsTotal - $docsDone).' lagi kurang' }}</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange"><i data-feather="award"></i></div>
                        <div class="stat-info">
                            <div class="label">Status Nominasi</div>
                            <div class="value">{{ $organisasi->nilai ?? 0 }}</div>
                            <div class="sub">Poin sementara</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green"><i data-feather="calendar"></i></div>
                        <div class="stat-info">
                            <div class="label">Terdaftar Sejak</div>
                            <div class="value" style="font-size:1.1rem;">{{ $organisasi->created_at->format('d M') }}</div>
                            <div class="sub">{{ $organisasi->created_at->format('Y') }}</div>
                        </div>
                    </div>
                </div>

                <div class="documents-section">
                    <h3>Status Kelengkapan Dokumen</h3>
                    <div class="documents-grid">
                        <!-- Status Cards -->
                        <div class="document-card {{ $organisasi->surat_rekomendasi ? 'completed' : '' }}">
                            <h4>Surat Rekomendasi Sekolah</h4>
                            <div class="document-status {{ $organisasi->surat_rekomendasi ? 'completed' : 'pending' }}">
                                <i data-feather="{{ $organisasi->surat_rekomendasi ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ $organisasi->surat_rekomendasi ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ $organisasi->struktur_kepengurusan ? 'completed' : '' }}">
                            <h4>Struktur Kepengurusan</h4>
                            <div class="document-status {{ $organisasi->struktur_kepengurusan ? 'completed' : 'pending' }}">
                                <i data-feather="{{ $organisasi->struktur_kepengurusan ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ $organisasi->struktur_kepengurusan ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ $organisasi->buktishare ? 'completed' : '' }}">
                            <h4>Bukti Share IG Story</h4>
                            <div class="document-status {{ $organisasi->buktishare ? 'completed' : 'pending' }}">
                                <i data-feather="{{ $organisasi->buktishare ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ $organisasi->buktishare ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ $organisasi->buktirepost ? 'completed' : '' }}">
                            <h4>Bukti Repost IG Feeds</h4>
                            <div class="document-status {{ $organisasi->buktirepost ? 'completed' : 'pending' }}">
                                <i data-feather="{{ $organisasi->buktirepost ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ $organisasi->buktirepost ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nomination Status -->
                <div class="documents-section">
                    <h3>Status Nominasi</h3>
                    <div class="documents-grid">
                        <div class="document-card {{ ($organisasi->portofolio_program_kerja && $organisasi->google_form_kepuasan) ? 'completed' : '' }}">
                            <h4>🏆 Innovation</h4>
                            <div class="document-status {{ ($organisasi->portofolio_program_kerja && $organisasi->google_form_kepuasan) ? 'completed' : 'pending' }}">
                                <i data-feather="{{ ($organisasi->portofolio_program_kerja && $organisasi->google_form_kepuasan) ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ ($organisasi->portofolio_program_kerja && $organisasi->google_form_kepuasan) ? 'Lengkap' : 'Belum lengkap' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ ($organisasi->portofolio_kegiatan_sosial && $organisasi->google_form_kepuasan_sosial) ? 'completed' : '' }}">
                            <h4>🤝 Social Impact</h4>
                            <div class="document-status {{ ($organisasi->portofolio_kegiatan_sosial && $organisasi->google_form_kepuasan_sosial) ? 'completed' : 'pending' }}">
                                <i data-feather="{{ ($organisasi->portofolio_kegiatan_sosial && $organisasi->google_form_kepuasan_sosial) ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ ($organisasi->portofolio_kegiatan_sosial && $organisasi->google_form_kepuasan_sosial) ? 'Lengkap' : 'Belum lengkap' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ ($organisasi->portofolio_sosial_media && $organisasi->google_form_kepuasan_media) ? 'completed' : '' }}">
                            <h4>📱 Media</h4>
                            <div class="document-status {{ ($organisasi->portofolio_sosial_media && $organisasi->google_form_kepuasan_media) ? 'completed' : 'pending' }}">
                                <i data-feather="{{ ($organisasi->portofolio_sosial_media && $organisasi->google_form_kepuasan_media) ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ ($organisasi->portofolio_sosial_media && $organisasi->google_form_kepuasan_media) ? 'Lengkap' : 'Belum lengkap' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ ($organisasi->link_instagram_reels && $organisasi->google_form_kepuasan_reels) ? 'completed' : '' }}">
                            <h4>🎬 Video Reels</h4>
                            <div class="document-status {{ ($organisasi->link_instagram_reels && $organisasi->google_form_kepuasan_reels) ? 'completed' : 'pending' }}">
                                <i data-feather="{{ ($organisasi->link_instagram_reels && $organisasi->google_form_kepuasan_reels) ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ ($organisasi->link_instagram_reels && $organisasi->google_form_kepuasan_reels) ? 'Lengkap' : 'Belum lengkap' }}</span>
                            </div>
                        </div>

                        @php
                            $presidentComplete = $organisasi->pas_foto_formal && 
                                                $organisasi->curriculum_vitae && 
                                                $organisasi->fotokopi_rapor && 
                                                $organisasi->video_profil_jakarta && 
                                                $organisasi->portofolio_inovasi && 
                                                $organisasi->esai_solusi_kepemimpinan && 
                                                $organisasi->surat_pernyataan_kedisiplinan && 
                                                $organisasi->google_form_kepuasan_president;
                        @endphp
                        <div class="document-card {{ $presidentComplete ? 'completed' : '' }}">
                            <h4>👑 President</h4>
                            <div class="document-status {{ $presidentComplete ? 'completed' : 'pending' }}">
                                <i data-feather="{{ $presidentComplete ? 'check-circle' : 'clock' }}"></i>
                                <span>{{ $presidentComplete ? 'Lengkap' : 'Belum lengkap' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Section -->
            <div id="documents" class="content-section">
                <div class="documents-section">
                    <h3>Upload Dokumen</h3>
                    <p style="margin-bottom: 20px;">Silakan lengkapi dokumen-dokumen berikut untuk melengkapi pendaftaran Anda.</p>
                    
                    <form action="{{ route('organisasi.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="documents-grid">
                            <!-- Surat Rekomendasi -->
                            <div class="document-card {{ $organisasi->surat_rekomendasi ? 'completed' : '' }}">
                                <h4>Surat Rekomendasi Sekolah</h4>
                                <div class="document-status {{ $organisasi->surat_rekomendasi ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->surat_rekomendasi ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->surat_rekomendasi ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->surat_rekomendasi)
                                    <a href="{{ Storage::url($organisasi->surat_rekomendasi) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat dokumen tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="surat_rekomendasi">Upload Dokumen PDF:</label>
                                    <div class="note-box">
                                        <strong>Catatan Penting:</strong><br>
                                        Surat menggunakan kop surat resmi sekolah, dilengkapi tanda tangan kepala sekolah serta cap/stempel sekolah
                                    </div>
                                    <input type="file" id="surat_rekomendasi" name="surat_rekomendasi" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <!-- Struktur Kepengurusan -->
                            <div class="document-card {{ $organisasi->struktur_kepengurusan ? 'completed' : '' }}">
                                <h4>Struktur Kepengurusan & Kabinet</h4>
                                <div class="document-status {{ $organisasi->struktur_kepengurusan ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->struktur_kepengurusan ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->struktur_kepengurusan ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->struktur_kepengurusan)
                                    <a href="{{ Storage::url($organisasi->struktur_kepengurusan) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat dokumen tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="struktur_kepengurusan">Upload Dokumen PDF:</label>
                                    <div class="note-box">
                                        <strong>Catatan Penting:</strong><br>
                                        Surat menggunakan kop surat resmi sekolah, dilengkapi tanda tangan kepala sekolah serta cap/stempel sekolah
                                    </div>
                                    <input type="file" id="struktur_kepengurusan" name="struktur_kepengurusan" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <!-- Bukti Share IG -->
                            <div class="document-card {{ $organisasi->buktishare ? 'completed' : '' }}">
                                <h4>Screenshot Share IG Story</h4>
                                <div class="document-status {{ $organisasi->buktishare ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->buktishare ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->buktishare ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->buktishare)
                                    <a href="{{ Storage::url($organisasi->buktishare) }}" target="_blank" class="file-link">
                                        <i data-feather="image" style="width:16px;"></i> Lihat gambar tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="buktishare">Upload Gambar JPG/PNG:</label>
                                    <div class="note-box">
                                        <strong>Catatan Penting:</strong><br>
                                        Screenshot menampilkan nama akun dan postingan secara jelas serta masih tersedia (belum dihapus)
                                    </div>
                                    <input type="file" id="buktishare" name="buktishare" accept=".jpg,.jpeg,.png">
                                    <small>Format: JPG/PNG, Maks 2MB</small>
                                </div>
                            </div>

                            <!-- Bukti Repost IG -->
                            <div class="document-card {{ $organisasi->buktirepost ? 'completed' : '' }}">
                                <h4>Screenshot Repost IG Feeds</h4>
                                <div class="document-status {{ $organisasi->buktirepost ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->buktirepost ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->buktirepost ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->buktirepost)
                                    <a href="{{ Storage::url($organisasi->buktirepost) }}" target="_blank" class="file-link">
                                        <i data-feather="image" style="width:16px;"></i> Lihat gambar tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="buktirepost">Upload Gambar JPG/PNG:</label>
                                    <div class="note-box">
                                        <strong>Catatan Penting:</strong><br>
                                        Screenshot menampilkan nama akun dan postingan secara jelas serta masih tersedia (belum dihapus)
                                    </div>
                                    <input type="file" id="buktirepost" name="buktirepost" accept=".jpg,.jpeg,.png">
                                    <small>Format: JPG/PNG, Maks 2MB</small>
                                </div>
                            </div>
                        </div>

                        <div style="text-align: right; margin-top: 30px;">
                            <button type="submit" class="btn">
                                <i data-feather="upload-cloud"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Nominations Section -->
            <div id="nominations" class="content-section">
                <div class="welcome-card">
                    <h2>Kategori Nominasi</h2>
                    <p>Pilih dan lengkapi kategori nominasi yang ingin Anda ikuti. Setiap kategori memiliki persyaratan dokumen yang berbeda.</p>
                </div>

                <form action="{{ route('organisasi.upload.nomination') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Logic to determine if user already picked a category -->
                    @php
                        $lockedCategory = '';
                        if ($organisasi->portofolio_program_kerja || $organisasi->google_form_kepuasan) {
                            $lockedCategory = 'cat1';
                        } elseif ($organisasi->portofolio_kegiatan_sosial || $organisasi->google_form_kepuasan_sosial) {
                            $lockedCategory = 'cat2';
                        } elseif ($organisasi->portofolio_sosial_media || $organisasi->google_form_kepuasan_media) {
                            $lockedCategory = 'cat3';
                        } elseif ($organisasi->link_instagram_reels || $organisasi->google_form_kepuasan_reels) {
                            $lockedCategory = 'cat4';
                        } elseif ($organisasi->pas_foto_formal || $organisasi->curriculum_vitae || $organisasi->fotokopi_rapor || $organisasi->video_profil_jakarta || $organisasi->portofolio_inovasi || $organisasi->esai_solusi_kepemimpinan || $organisasi->surat_pernyataan_kedisiplinan || $organisasi->google_form_kepuasan_president) {
                            $lockedCategory = 'cat5';
                        }
                    @endphp

                    <!-- Category Selector Dropdown -->
                    <div class="welcome-card" style="padding: 25px; margin-bottom: 25px;">
                        <label for="category_selector" style="font-size: 1.1rem; color: #0f172a; margin-bottom: 12px; font-weight: 600; display: block;">Pilih Kategori Nominasi yang Ingin Diikuti:</label>
                        <select id="category_selector" onchange="filterCategory(this.value)" style="width: 100%; padding: 15px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f8fafc; font-size: 1rem; color: #334155; cursor: pointer; transition: all 0.3s ease; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02); appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23334155%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 15px top 50%; background-size: 12px auto; outline: none;" {{ $lockedCategory ? 'disabled' : '' }}>
                            <option value="" disabled {{ !$lockedCategory ? 'selected' : '' }}>-- Pilih Kategori Nominasi --</option>
                            <option value="cat1" {{ $lockedCategory == 'cat1' ? 'selected' : ($lockedCategory ? 'disabled' : '') }}>🏆 Outstanding Student Council Innovation</option>
                            <option value="cat2" {{ $lockedCategory == 'cat2' ? 'selected' : ($lockedCategory ? 'disabled' : '') }}>🤝 Leading Student Council Social Impact</option>
                            <option value="cat3" {{ $lockedCategory == 'cat3' ? 'selected' : ($lockedCategory ? 'disabled' : '') }}>📱 Next-Level Student Council Media</option>
                            <option value="cat4" {{ $lockedCategory == 'cat4' ? 'selected' : ($lockedCategory ? 'disabled' : '') }}>🎬 Video IG Reels</option>
                            <option value="cat5" {{ $lockedCategory == 'cat5' ? 'selected' : ($lockedCategory ? 'disabled' : '') }}>👑 Student Council President of the Year 2026</option>
                        </select>
                        
                        @if($lockedCategory)
                            <div class="note-box" style="margin-top: 15px; border-left-width: 6px; background: #fff5f5;">
                                <strong>Peringatan:</strong><br>
                                Anda hanya bisa mengikuti 1 kategori nominasi. Karena Anda sudah mengunggah persyaratan di kategori ini, kategori lainnya ditutup secara otomatis untuk akun Anda.
                            </div>
                        @endif
                    </div>

                    <script>
                        function clearCategoryInputs(catId) {
                            const section = document.getElementById(catId);
                            if (!section) return;
                            
                            // Kosongkan file & url agar tidak tersubmit ganda
                            const inputs = section.querySelectorAll('input[type="file"], input[type="url"]');
                            inputs.forEach(input => input.value = '');
                            
                            const checkboxes = section.querySelectorAll('input[type="checkbox"]');
                            checkboxes.forEach(input => input.checked = false);
                        }

                        function filterCategory(catId) {
                            for(let i = 1; i <= 5; i++) {
                                const id = 'cat' + i;
                                const el = document.getElementById(id);
                                if(el) {
                                    el.style.display = 'none';
                                    if(id !== catId) {
                                        clearCategoryInputs(id);
                                    }
                                }
                            }
                            if(catId) {
                                document.getElementById(catId).style.display = 'block';
                            }
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            @if($lockedCategory)
                                filterCategory('{{ $lockedCategory }}');
                            @endif
                        });
                    </script>

                    <!-- Category 1: Innovation -->
                    <div class="documents-section" id="cat1" style="display: none;">
                        <h3>🏆 Outstanding Student Council Innovation</h3>
                        <p style="margin-bottom: 20px; color: #666;">Kategori untuk organisasi dengan program kerja inovatif dan berdampak.</p>
                        
                        <div class="documents-grid">
                            <div class="document-card {{ $organisasi->portofolio_program_kerja ? 'completed' : '' }}">
                                <h4>Portofolio Program Kerja</h4>
                                <div class="document-status {{ $organisasi->portofolio_program_kerja ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->portofolio_program_kerja ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->portofolio_program_kerja ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->portofolio_program_kerja)
                                    <a href="{{ Storage::url($organisasi->portofolio_program_kerja) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat dokumen tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="portofolio_program_kerja">Upload Portofolio PDF:</label>
                                    <input type="file" id="portofolio_program_kerja" name="portofolio_program_kerja" accept=".pdf">
                                    <small>Format: PDF, Maks 5MB</small>
                                </div>
                            </div>

                            <div class="document-card">
                                <h4>Form Kepuasan OSIS</h4>
                                <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Isi form kepuasan untuk kategori ini</p>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="google_form_kepuasan" name="google_form_kepuasan" value="1" {{ $organisasi->google_form_kepuasan ? 'checked' : '' }}>
                                    <label for="google_form_kepuasan">Saya sudah mengisi <a href="https://forms.gle/3Wt8MmfSke3x8hj6A" target="_blank" style="color: #e53e3e; font-weight: 600;">Form Kepuasan OSIS</a></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category 2: Social Impact -->
                    <div class="documents-section" id="cat2" style="display: none;">
                        <h3>🤝 Leading Student Council Social Impact</h3>
                        <p style="margin-bottom: 20px; color: #666;">Kategori untuk organisasi dengan kegiatan sosial yang berdampak luas.</p>
                        
                        <div class="documents-grid">
                            <div class="document-card {{ $organisasi->portofolio_kegiatan_sosial ? 'completed' : '' }}">
                                <h4>Portofolio Kegiatan Sosial</h4>
                                <div class="document-status {{ $organisasi->portofolio_kegiatan_sosial ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->portofolio_kegiatan_sosial ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->portofolio_kegiatan_sosial ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->portofolio_kegiatan_sosial)
                                    <a href="{{ Storage::url($organisasi->portofolio_kegiatan_sosial) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat dokumen tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="portofolio_kegiatan_sosial">Upload Portofolio PDF:</label>
                                    <input type="file" id="portofolio_kegiatan_sosial" name="portofolio_kegiatan_sosial" accept=".pdf">
                                    <small>Format: PDF, Maks 5MB</small>
                                </div>
                            </div>

                            <div class="document-card">
                                <h4>Form Kepuasan OSIS</h4>
                                <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Isi form kepuasan untuk kategori ini</p>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="google_form_kepuasan_sosial" name="google_form_kepuasan_sosial" value="1" {{ $organisasi->google_form_kepuasan_sosial ? 'checked' : '' }}>
                                    <label for="google_form_kepuasan_sosial">Saya sudah mengisi <a href="https://forms.gle/3Wt8MmfSke3x8hj6A" target="_blank" style="color: #e53e3e; font-weight: 600;">Form Kepuasan OSIS</a></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category 3: Media -->
                    <div class="documents-section" id="cat3" style="display: none;">
                        <h3>📱 Next-Level Student Council Media</h3>
                        <p style="margin-bottom: 20px; color: #666;">Kategori untuk organisasi dengan pengelolaan media sosial yang kreatif.</p>
                        
                        <div class="documents-grid">
                            <div class="document-card {{ $organisasi->portofolio_sosial_media ? 'completed' : '' }}">
                                <h4>Portofolio Sosial Media</h4>
                                <div class="document-status {{ $organisasi->portofolio_sosial_media ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->portofolio_sosial_media ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->portofolio_sosial_media ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->portofolio_sosial_media)
                                    <a href="{{ Storage::url($organisasi->portofolio_sosial_media) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat dokumen tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="portofolio_sosial_media">Upload Portofolio PDF:</label>
                                    <input type="file" id="portofolio_sosial_media" name="portofolio_sosial_media" accept=".pdf">
                                    <small>Format: PDF, Maks 5MB</small>
                                </div>
                            </div>

                            <div class="document-card">
                                <h4>Form Kepuasan OSIS</h4>
                                <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Isi form kepuasan untuk kategori ini</p>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="google_form_kepuasan_media" name="google_form_kepuasan_media" value="1" {{ $organisasi->google_form_kepuasan_media ? 'checked' : '' }}>
                                    <label for="google_form_kepuasan_media">Saya sudah mengisi <a href="https://forms.gle/3Wt8MmfSke3x8hj6A" target="_blank" style="color: #e53e3e; font-weight: 600;">Form Kepuasan OSIS</a></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category 4: Video Reels -->
                    <div class="documents-section" id="cat4" style="display: none;">
                        <h3>🎬 Video IG Reels</h3>
                        <p style="margin-bottom: 20px; color: #666;">Kategori untuk video Instagram Reels terbaik.</p>
                        
                        <div class="documents-grid">
                            <div class="document-card {{ $organisasi->link_instagram_reels ? 'completed' : '' }}">
                                <h4>Link Instagram Reels</h4>
                                <div class="document-status {{ $organisasi->link_instagram_reels ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->link_instagram_reels ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->link_instagram_reels ? 'Selesai' : 'Belum diisi' }}</span>
                                </div>
                                
                                @if($organisasi->link_instagram_reels)
                                    <a href="{{ $organisasi->link_instagram_reels }}" target="_blank" class="file-link">
                                        <i data-feather="link" style="width:16px;"></i> Lihat link tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="link_instagram_reels">Link Instagram Reels:</label>
                                    <input type="url" id="link_instagram_reels" name="link_instagram_reels" value="{{ $organisasi->link_instagram_reels }}" placeholder="https://instagram.com/...">
                                    <small>Masukkan link Instagram Reels yang valid</small>
                                </div>
                            </div>

                            <div class="document-card">
                                <h4>Form Kepuasan OSIS</h4>
                                <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Isi form kepuasan untuk kategori ini</p>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="google_form_kepuasan_reels" name="google_form_kepuasan_reels" value="1" {{ $organisasi->google_form_kepuasan_reels ? 'checked' : '' }}>
                                    <label for="google_form_kepuasan_reels">Saya sudah mengisi <a href="https://forms.gle/3Wt8MmfSke3x8hj6A" target="_blank" style="color: #e53e3e; font-weight: 600;">Form Kepuasan OSIS</a></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category 5: President -->
                    <div class="documents-section" id="cat5" style="display: none;">
                        <h3>👑 Student Council President of the Year 2026</h3>
                        <p style="margin-bottom: 20px; color: #666;">Kategori untuk Ketua OSIS terbaik tahun 2026.</p>
                        
                        <div class="documents-grid">
                            <div class="document-card {{ $organisasi->pas_foto_formal ? 'completed' : '' }}">
                                <h4>Pas Foto Formal</h4>
                                <div class="document-status {{ $organisasi->pas_foto_formal ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->pas_foto_formal ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->pas_foto_formal ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->pas_foto_formal)
                                    <a href="{{ Storage::url($organisasi->pas_foto_formal) }}" target="_blank" class="file-link">
                                        <i data-feather="image" style="width:16px;"></i> Lihat foto tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="pas_foto_formal">Upload Pas Foto:</label>
                                    <input type="file" id="pas_foto_formal" name="pas_foto_formal" accept=".jpg,.jpeg,.png">
                                    <small>Format: JPG/PNG, Maks 2MB</small>
                                </div>
                            </div>

                            <div class="document-card {{ $organisasi->curriculum_vitae ? 'completed' : '' }}">
                                <h4>Curriculum Vitae (CV)</h4>
                                <div class="document-status {{ $organisasi->curriculum_vitae ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->curriculum_vitae ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->curriculum_vitae ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->curriculum_vitae)
                                    <a href="{{ Storage::url($organisasi->curriculum_vitae) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat CV tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="curriculum_vitae">Upload CV PDF:</label>
                                    <input type="file" id="curriculum_vitae" name="curriculum_vitae" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <div class="document-card {{ $organisasi->fotokopi_rapor ? 'completed' : '' }}">
                                <h4>Fotokopi Rapor</h4>
                                <div class="document-status {{ $organisasi->fotokopi_rapor ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->fotokopi_rapor ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->fotokopi_rapor ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->fotokopi_rapor)
                                    <a href="{{ Storage::url($organisasi->fotokopi_rapor) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat rapor tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="fotokopi_rapor">Upload Rapor PDF:</label>
                                    <input type="file" id="fotokopi_rapor" name="fotokopi_rapor" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <div class="document-card {{ $organisasi->video_profil_jakarta ? 'completed' : '' }}">
                                <h4>Video Profil Jakarta</h4>
                                <div class="document-status {{ $organisasi->video_profil_jakarta ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->video_profil_jakarta ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->video_profil_jakarta ? 'Selesai' : 'Belum diisi' }}</span>
                                </div>
                                
                                @if($organisasi->video_profil_jakarta)
                                    <a href="{{ $organisasi->video_profil_jakarta }}" target="_blank" class="file-link">
                                        <i data-feather="link" style="width:16px;"></i> Lihat link tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="video_profil_jakarta">Link Video:</label>
                                    <input type="url" id="video_profil_jakarta" name="video_profil_jakarta" value="{{ $organisasi->video_profil_jakarta }}" placeholder="https://youtube.com/...">
                                    <small>Masukkan link video YouTube/Drive</small>
                                </div>
                            </div>

                            <div class="document-card {{ $organisasi->portofolio_inovasi ? 'completed' : '' }}">
                                <h4>Portofolio Inovasi</h4>
                                <div class="document-status {{ $organisasi->portofolio_inovasi ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->portofolio_inovasi ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->portofolio_inovasi ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->portofolio_inovasi)
                                    <a href="{{ Storage::url($organisasi->portofolio_inovasi) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat portofolio tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="portofolio_inovasi">Upload Portofolio PDF:</label>
                                    <input type="file" id="portofolio_inovasi" name="portofolio_inovasi" accept=".pdf">
                                    <small>Format: PDF, Maks 5MB</small>
                                </div>
                            </div>

                            <div class="document-card {{ $organisasi->esai_solusi_kepemimpinan ? 'completed' : '' }}">
                                <h4>Esai Solusi Kepemimpinan</h4>
                                <div class="document-status {{ $organisasi->esai_solusi_kepemimpinan ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->esai_solusi_kepemimpinan ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->esai_solusi_kepemimpinan ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->esai_solusi_kepemimpinan)
                                    <a href="{{ Storage::url($organisasi->esai_solusi_kepemimpinan) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat esai tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="esai_solusi_kepemimpinan">Upload Esai PDF:</label>
                                    <input type="file" id="esai_solusi_kepemimpinan" name="esai_solusi_kepemimpinan" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <div class="document-card {{ $organisasi->surat_pernyataan_kedisiplinan ? 'completed' : '' }}">
                                <h4>Surat Pernyataan Kedisiplinan</h4>
                                <div class="document-status {{ $organisasi->surat_pernyataan_kedisiplinan ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->surat_pernyataan_kedisiplinan ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->surat_pernyataan_kedisiplinan ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->surat_pernyataan_kedisiplinan)
                                    <a href="{{ Storage::url($organisasi->surat_pernyataan_kedisiplinan) }}" target="_blank" class="file-link">
                                        <i data-feather="file-text" style="width:16px;"></i> Lihat surat tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="surat_pernyataan_kedisiplinan">Upload Surat PDF:</label>
                                    <input type="file" id="surat_pernyataan_kedisiplinan" name="surat_pernyataan_kedisiplinan" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <div class="document-card">
                                <h4>Form Kepuasan OSIS</h4>
                                <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Isi form kepuasan untuk kategori ini</p>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="google_form_kepuasan_president" name="google_form_kepuasan_president" value="1" {{ $organisasi->google_form_kepuasan_president ? 'checked' : '' }}>
                                    <label for="google_form_kepuasan_president">Saya sudah mengisi <a href="https://forms.gle/3Wt8MmfSke3x8hj6A" target="_blank" style="color: #e53e3e; font-weight: 600;">Form Kepuasan OSIS</a></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: right; margin-top: 30px;">
                        <button type="submit" class="btn">
                            <i data-feather="upload-cloud"></i> Simpan Data Nominasi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Profile Section -->
            <div id="profile" class="content-section">
                <div class="welcome-card">
                    <h2>Informasi Organisasi</h2>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                        <div>
                            <h4 style="color: #e53e3e; margin-bottom: 15px;">Data Organisasi</h4>
                            <div style="margin-bottom: 15px;">
                                <strong>Nama Organisasi:</strong><br>
                                {{ $organisasi->nama_organisasi }}
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong>Email:</strong><br>
                                {{ $organisasi->user->email }}
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong>Nama Sekolah:</strong><br>
                                {{ $organisasi->nama_sekolah }}
                            </div>
                        </div>
                        <div>
                            <h4 style="color: #e53e3e; margin-bottom: 15px;">Kontak & Pendaftaran</h4>
                            <div style="margin-bottom: 15px;">
                                <strong>Nomor WhatsApp:</strong><br>
                                {{ $organisasi->nomor_wa }}
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong>Tanggal Pendaftaran:</strong><br>
                                {{ $organisasi->created_at->format('d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace();

        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            
            document.getElementById(sectionId).classList.add('active');
            
            const clickedItem = document.querySelector(`[data-section="${sectionId}"]`);
            if (clickedItem) clickedItem.classList.add('active');
        }

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Data Tersimpan!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#28a745',
                customClass: {
                    title: 'font-outfit',
                    content: 'font-inter'
                }
            });
        @endif
        
        @if(session('error') || $errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan',
                text: '{{ session('error') ?? "Periksa kembali format atau ukuran dokumen yang Anda unggah." }}',
                confirmButtonColor: '#e53e3e',
            });
        @endif
    </script>
</body>
</html>
