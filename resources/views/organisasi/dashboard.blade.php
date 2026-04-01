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
        :root {
            --primary: #e53e3e;
            --secondary: #dd6b20;
            --dark: #0f172a;
            --light: #f8fafc;
            --white: #ffffff;
            --text-main: #334155;
            --text-muted: #64748b;
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Inter', sans-serif;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.4);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: radial-gradient(circle at top right, rgba(229, 62, 62, 0.05), transparent 40%),
                        radial-gradient(circle at bottom left, rgba(221, 107, 32, 0.05), transparent 40%);
            background-color: var(--light);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            color: var(--dark);
        }

        .header {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--glass-shadow);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            height: 60px;
            width: auto;
            margin-right: 15px;
        }

        .header h1 {
            font-size: 1.4rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header .user-info {
            text-align: right;
            border-left: 2px solid #e2e8f0;
            padding-left: 15px;
        }

        .header .user-info p:first-child {
            font-weight: 600;
            color: var(--dark);
        }

        .header .user-info p:last-child {
            font-size: 13px;
            color: var(--text-muted);
        }

        .main-container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 280px;
            background: var(--white);
            box-shadow: 2px 0 10px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .sidebar-header {
            padding: 25px;
        }

        .sidebar-header h3 {
            color: var(--text-muted);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 18px 25px;
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .sidebar-menu a i {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            color: var(--text-muted);
            transition: var(--transition);
        }

        .sidebar-menu a:hover {
            background: rgba(229, 62, 62, 0.05);
            color: var(--primary);
        }

        .sidebar-menu a:hover i {
            color: var(--primary);
        }

        .sidebar-menu a.active {
            background: rgba(229, 62, 62, 0.08);
            color: var(--primary);
            border-left: 4px solid var(--primary);
            font-weight: 600;
        }
        
        .sidebar-menu a.active i {
            color: var(--primary);
        }

        .sidebar-footer {
            padding: 20px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .user-info-sidebar .name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark);
        }
        
        .user-info-sidebar .school {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .btn-logout-sidebar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fee2e2;
            color: var(--primary);
            transition: var(--transition);
        }
        
        .btn-logout-sidebar:hover {
            background: var(--primary);
            color: var(--white);
            transform: scale(1.05);
        }

        .content-area {
            flex: 1;
            padding: 40px;
            max-width: calc(100vw - 280px);
        }

        .content-section {
            display: none;
            animation: fadeIn 0.4s ease forwards;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .welcome-card {
            background: var(--white);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            border: 1px solid rgba(0,0,0,0.02);
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }

        .documents-section {
            background: var(--white);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.02);
            margin-bottom: 30px;
        }

        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .document-card {
            background: var(--light);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            transition: var(--transition);
        }

        .document-card:hover {
            border-color: rgba(229, 62, 62, 0.3);
            box-shadow: 0 5px 15px -5px rgba(229, 62, 62, 0.1);
            transform: translateY(-2px);
        }

        .document-card.completed {
            border-color: #86efac;
            background: #f0fdf4;
        }

        .document-card h4 {
            font-size: 1.1rem;
            margin-bottom: 12px;
        }

        .document-status {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .document-status.pending {
            background: #fef3c7;
            color: #b45309;
        }

        .document-status.completed {
            background: #dcfce7;
            color: #15803d;
        }

        .document-status i {
            width: 14px;
            height: 14px;
            margin-right: 6px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-main);
            font-weight: 500;
        }

        input[type="file"], input[type="url"], input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            background: var(--white);
            cursor: pointer;
            transition: var(--transition);
        }

        input[type="file"]:hover, input[type="url"]:hover, input[type="text"]:hover {
            border-color: var(--primary);
            background: rgba(229, 62, 62, 0.02);
        }

        input[type="url"], input[type="text"] {
            border-style: solid;
            cursor: text;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: #f0f9ff;
            border-radius: 8px;
            margin-top: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            font-family: var(--font-heading);
            font-size: 1rem;
            box-shadow: 0 4px 14px 0 rgba(229, 62, 62, 0.25);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px 0 rgba(229, 62, 62, 0.4);
        }
        
        .file-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 15px;
            padding: 8px 12px;
            background: rgba(229, 62, 62, 0.05);
            border-radius: 8px;
            transition: var(--transition);
        }
        
        .file-link:hover {
            background: rgba(229, 62, 62, 0.1);
        }

        small {
            display: block;
            color: var(--text-muted);
            font-size: 0.8rem;
            margin-top: 6px;
        }

        .note-box {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            border-left: 4px solid #e53e3e;
        }

        @media (max-width: 768px) {
            .main-container { flex-direction: column; }
            .sidebar { width: 100%; height: auto; display: flex; flex-direction: column; }
            .sidebar-menu { display: flex; overflow-x: auto; scrollbar-width: none; }
            .sidebar-menu a { padding: 15px; border-left: none; border-bottom: 3px solid transparent; white-space: nowrap; }
            .sidebar-menu a.active { border-left: none; border-bottom: 3px solid var(--primary); }
            .content-area { padding: 20px; max-width: 100%; }
            .header { flex-direction: column; gap: 15px; text-align: center; }
            .header .user-info { border-left: none; padding-left: 0; text-align: center; border-top: 1px solid #e2e8f0; padding-top: 10px; }
            .documents-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo">
            <h1>Dashboard Organisasi</h1>
        </div>
        <div class="user-info">
            <p>{{ $organisasi->nama_organisasi }}</p>
            <p style="font-size: 14px; opacity: 0.8;">{{ $organisasi->nama_sekolah }}</p>
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
                    <form action="{{ route('organisasi.logout') }}" method="POST" style="display: inline;">
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
                <!-- Logo Section -->
                <div class="text-center mb-6">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo" style="height: 60px; width: auto; margin: 0 auto 15px;">
                    <h2 style="color: #e53e3e; font-size: 1.5rem; font-weight: bold; margin-bottom: 5px;">Dashboard Organisasi</h2>
                    <p style="color: #666; font-size: 0.9rem;">Jakarta Youth Achievement Award 2026</p>
                </div>

                <div class="welcome-card">
                    <h2>Selamat Datang, {{ $organisasi->nama_organisasi }}!</h2>
                    <p>Dashboard ini menampilkan informasi organisasi dan status kelengkapan dokumen Anda.</p>
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

                    <!-- Category 1: Innovation -->
                    <div class="documents-section">
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
                    <div class="documents-section">
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
                    <div class="documents-section">
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
                    <div class="documents-section">
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
                    <div class="documents-section">
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
