<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ketos - Youth Generation</title>
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
            background: radial-gradient(circle at top left, rgba(221, 107, 32, 0.05), transparent 40%),
                        radial-gradient(circle at bottom right, rgba(229, 62, 62, 0.05), transparent 40%);
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
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
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

        .sidebar-menu a i, .sidebar-menu a .feather {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            color: var(--text-muted);
            transition: var(--transition);
        }

        .sidebar-menu a:hover {
            background: rgba(221, 107, 32, 0.05);
            color: var(--secondary);
        }

        .sidebar-menu a:hover i, .sidebar-menu a:hover .feather {
            color: var(--secondary);
        }

        .sidebar-menu a.active {
            background: rgba(221, 107, 32, 0.08);
            color: var(--secondary);
            border-left: 4px solid var(--secondary);
            font-weight: 600;
        }
        
        .sidebar-menu a.active i, .sidebar-menu a.active .feather {
            color: var(--secondary);
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
            font-size: 0.9rem;
            color: var(--dark);
            font-weight: 600;
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
            background: #ffedd5;
            color: var(--secondary);
            transition: var(--transition);
        }
        
        .btn-logout-sidebar:hover {
            background: var(--secondary);
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

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .info-card {
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.02);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--secondary), var(--primary));
        }

        .info-card h4 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: var(--secondary);
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .status-card {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px -10px rgba(16, 185, 129, 0.4);
        }
        
        .status-card h3 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: white;
        }

        .btn-logout {
            display: none; /* Replaced by sidebar logout */
        }
        
        .nilai-display {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
            text-align: center;
            border: 1px solid rgba(0,0,0,0.02);
        }
        
        .nilai-display .score {
            font-size: 4rem;
            font-family: var(--font-heading);
            font-weight: 800;
            color: var(--secondary);
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.05);
        }
        
        .nilai-display .no-score {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin: 20px 0;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
        }
        
        .nomination-section {
            background: var(--white);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            border: 1px solid rgba(0,0,0,0.02);
        }
        
        .nomination-title {
            color: var(--secondary);
            font-size: 1.5rem;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
            font-family: var(--font-heading);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .requirements-section {
            margin-bottom: 35px;
        }
        
        .requirements-section h4 {
            color: var(--dark);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        
        .requirements-list {
            background: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }
        
        .requirements-list ul {
            list-style: none;
            padding: 0;
        }
        
        .requirements-list li {
            margin-bottom: 12px;
            padding-left: 28px;
            position: relative;
            line-height: 1.5;
            color: var(--text-main);
        }
        
        .requirements-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #10b981;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .upload-form {
            background: var(--white);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-main);
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="url"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: var(--font-body);
            transition: var(--transition);
            background: var(--white);
            color: var(--text-main);
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(221, 107, 32, 0.1);
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            background: var(--white);
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        input[type="file"]:hover {
            border-color: var(--secondary);
            background: rgba(221, 107, 32, 0.02);
        }

        .btn-upload, .btn-save {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            color: white;
            padding: 14px 32px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: var(--font-heading);
            box-shadow: 0 4px 14px 0 rgba(221, 107, 32, 0.25);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }

        .btn-upload:hover, .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px 0 rgba(221, 107, 32, 0.4);
        }

        .file-info {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .current-files {
            background: #f0fdf4;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            border: 1px solid #bbf7d0;
        }

        .current-files h5 {
            color: #166534;
            margin-bottom: 12px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .file-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 8px;
            padding: 8px 12px;
            background: rgba(221, 107, 32, 0.05);
            border-radius: 8px;
            transition: var(--transition);
            word-break: break-all;
        }
        
        .file-link:hover {
            background: rgba(221, 107, 32, 0.1);
        }

        /* Notice banner removal - replaced by SweetAlert */
        .alert {
            display: none !important; 
        }

        @media (max-width: 768px) {
            .main-container { flex-direction: column; }
            .sidebar { width: 100%; height: auto; display: flex; flex-direction: column; }
            .sidebar-menu { display: flex; overflow-x: auto; scrollbar-width: none; }
            .sidebar-menu a { padding: 15px; border-left: none; border-bottom: 3px solid transparent; white-space: nowrap; }
            .sidebar-menu a.active { border-left: none; border-bottom: 3px solid var(--secondary); }
            .content-area { padding: 20px; max-width: 100%; }
            .header { flex-direction: column; gap: 15px; text-align: center; }
            .header .user-info { border-left: none; padding-left: 0; text-align: center; border-top: 1px solid #e2e8f0; padding-top: 10px; }
            .info-grid { grid-template-columns: 1fr; }
        }
    </style>
</head><body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset('icon/logo collab.png') }}" alt="Youth Generation Logo">
            <h1>Dashboard Ketos</h1>
        </div>
        <div class="user-info">
            <p>{{ $ketos->nama }}</p>
            <p style="font-size: 13px; color: var(--text-muted);">{{ $ketos->asal_sekolah }}</p>
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
                <li><a href="#" onclick="showSection('profile')" class="menu-item" data-section="profile"><i data-feather="user"></i> Informasi Pribadi</a></li>
                <li><a href="#" onclick="showSection('edit-profile')" class="menu-item" data-section="edit-profile"><i data-feather="edit-2"></i> Edit Profil</a></li>
                <li><a href="#" onclick="showSection('nilai')" class="menu-item" data-section="nilai"><i data-feather="bar-chart-2"></i> Nilai Evaluasi</a></li>
                <li><a href="#" onclick="showSection('nominasi1')" class="menu-item" data-section="nominasi1"><i data-feather="award"></i> Outstanding Innovation</a></li>
                <li><a href="#" onclick="showSection('nominasi2')" class="menu-item" data-section="nominasi2"><i data-feather="heart"></i> Social Impact</a></li>
                <li><a href="#" onclick="showSection('nominasi3')" class="menu-item" data-section="nominasi3"><i data-feather="smartphone"></i> Next-Level Media</a></li>
                <li><a href="#" onclick="showSection('nominasi4')" class="menu-item" data-section="nominasi4"><i data-feather="video"></i> Video Reels</a></li>
                <li><a href="#" onclick="showSection('nominasi5')" class="menu-item" data-section="nominasi5"><i data-feather="star"></i> President 2026</a></li>
            </ul>
            
            <!-- Sidebar Footer with User Profile and Logout -->
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-info-sidebar">
                        <div class="name">{{ $ketos->nama }}</div>
                        <div class="school">{{ $ketos->asal_sekolah }}</div>
                    </div>
                    <a href="{{ route('ketos.logout') }}" class="btn-logout-sidebar" title="Logout">
                        <i data-feather="log-out" style="width:16px;"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Dashboard Section -->
            <div id="dashboard" class="content-section active">
                <div class="info-grid">
                    <div class="info-card">
                        <h4>Ringkasan Nominasi</h4>
                        <div class="info-item">
                            <div class="info-label">Total Nominasi Tersedia:</div>
                            <div class="info-value">5 Kategori</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Nominasi Terlengkapi:</div>
                            <div class="info-value">
                                {{ 
                                    collect([
                                        $ketos->portofolio_program_kerja && $ketos->google_form_kepuasan,
                                        $ketos->portofolio_kegiatan_sosial && $ketos->google_form_kepuasan_sosial,
                                        $ketos->portofolio_sosial_media && $ketos->google_form_kepuasan_media,
                                        $ketos->link_instagram_reels && $ketos->google_form_kepuasan_reels,
                                        $ketos->pas_foto_formal && $ketos->curriculum_vitae && $ketos->fotokopi_rapor && $ketos->video_profil_jakarta && $ketos->portofolio_inovasi && $ketos->esai_solusi_kepemimpinan && $ketos->google_form_kepuasan_president && $ketos->surat_pernyataan_kedisiplinan
                                    ])->filter()->count() 
                                }} dari 5
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Status Kelengkapan:</div>
                            <div class="info-value">
                                @php
                                    $completed = collect([
                                        $ketos->portofolio_program_kerja && $ketos->google_form_kepuasan,
                                        $ketos->portofolio_kegiatan_sosial && $ketos->google_form_kepuasan_sosial,
                                        $ketos->portofolio_sosial_media && $ketos->google_form_kepuasan_media,
                                        $ketos->link_instagram_reels && $ketos->google_form_kepuasan_reels,
                                        $ketos->pas_foto_formal && $ketos->curriculum_vitae && $ketos->fotokopi_rapor && $ketos->video_profil_jakarta && $ketos->portofolio_inovasi && $ketos->esai_solusi_kepemimpinan && $ketos->google_form_kepuasan_president && $ketos->surat_pernyataan_kedisiplinan
                                    ])->filter()->count();
                                    $percentage = ($completed / 5) * 100;
                                @endphp
                                <span style="color: {{ $percentage == 100 ? '#28a745' : ($percentage >= 50 ? '#ffc107' : '#dc3545') }}">
                                    {{ number_format($percentage, 0) }}% Lengkap
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="info-card">
                        <h4>Informasi Penting</h4>
                        <div class="info-item">
                            <div class="info-label">Batas Pengumpulan:</div>
                            <div class="info-value">30 April 2026</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Pengumuman Finalis:</div>
                            <div class="info-value">10 Mei 2026</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Awarding Night:</div>
                            <div class="info-value">22 Mei 2026</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <h4>Quick Actions</h4>
                        <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 15px;">
                            <button onclick="showSection('nominasi1')" style="padding: 10px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                🏆 Outstanding Innovation
                            </button>
                            <button onclick="showSection('nominasi5')" style="padding: 10px; background: #e53e3e; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                👑 President 2026
                            </button>
                            <button onclick="showSection('edit-profile')" style="padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                ✏️ Edit Profil
                            </button>
                            <button onclick="showSection('profile')" style="padding: 10px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                👤 Lihat Profil
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Section -->
            <div id="profile" class="content-section">
                <h2 style="color: #667eea; margin-bottom: 25px;">Informasi Pribadi</h2>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h4>Data Pribadi</h4>
                        <div class="info-item">
                            <div class="info-label">Nama:</div>
                            <div class="info-value">{{ $ketos->nama }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email:</div>
                            <div class="info-value">{{ $ketos->email }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Tempat, Tanggal Lahir:</div>
                            <div class="info-value">{{ $ketos->tempat_lahir }}, {{ $ketos->tanggal_lahir->format('d F Y') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Nomor WhatsApp:</div>
                            <div class="info-value">{{ $ketos->nomor_wa }}</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <h4>Informasi Sekolah</h4>
                        <div class="info-item">
                            <div class="info-label">Asal Sekolah:</div>
                            <div class="info-value">{{ $ketos->asal_sekolah }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Tanggal Pendaftaran:</div>
                            <div class="info-value">{{ $ketos->created_at->format('d F Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Profile Section -->
            <div id="edit-profile" class="content-section">
                <h2 style="color: #667eea; margin-bottom: 25px;">Edit Profil</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="nomination-section">
                    <form action="{{ route('ketos.update.profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="info-grid">
                            <div class="info-card">
                                <h4>Data Pribadi</h4>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap:</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama', $ketos->nama) }}" required 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('nama')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $ketos->email) }}" required 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('email')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir:</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $ketos->tempat_lahir) }}" required 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('tempat_lahir')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $ketos->tanggal_lahir->format('Y-m-d')) }}" required 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('tanggal_lahir')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="info-card">
                                <h4>Informasi Sekolah & Kontak</h4>
                                <div class="form-group">
                                    <label for="asal_sekolah">Asal Sekolah:</label>
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $ketos->asal_sekolah) }}" required 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('asal_sekolah')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nomor_wa">Nomor WhatsApp:</label>
                                    <input type="text" id="nomor_wa" name="nomor_wa" value="{{ old('nomor_wa', $ketos->nomor_wa) }}" required 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('nomor_wa')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password Baru (Kosongkan jika tidak ingin mengubah):</label>
                                    <input type="password" id="password" name="password" 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                    @error('password')
                                        <div style="color: #dc3545; font-size: 14px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password Baru:</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" 
                                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 15px;">
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center; margin-top: 30px;">
                            <button type="submit" class="btn-upload" style="background: #28a745; padding: 12px 30px;">
                                💾 Simpan Perubahan
                            </button>
                            <button type="button" onclick="showSection('profile')" style="background: #6c757d; color: white; padding: 12px 30px; border: none; border-radius: 5px; margin-left: 10px; cursor: pointer;">
                                ❌ Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Nilai Section -->
            <div id="nilai" class="content-section">
                <h2 style="color: #667eea; margin-bottom: 25px;">Nilai Evaluasi</h2>
                
                <div class="nilai-display">
                    @if($ketos->nilai)
                        <div class="score">{{ $ketos->nilai }}</div>
                        <p>Nilai Anda telah diberikan oleh admin</p>
                    @else
                        <div class="no-score">Belum Ada Nilai</div>
                        <p>Nilai akan diberikan setelah proses evaluasi selesai</p>
                    @endif
                </div>
            </div>

            <!-- Nominasi 1: Outstanding Student Council Innovation -->
            <div id="nominasi1" class="content-section">
                <div class="nomination-section">
                    <h2 class="nomination-title">Outstanding Student Council Innovation</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($ketos->portofolio_program_kerja || $ketos->google_form_kepuasan)
                        <div class="current-files">
                            <h5>Berkas yang Sudah Diupload:</h5>
                            @if($ketos->portofolio_program_kerja)
                                <p>✅ Portofolio Program Kerja OSIS: <a href="{{ asset('storage/' . $ketos->portofolio_program_kerja) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->google_form_kepuasan)
                                <p>✅ Google Form Kepuasan OSIS: <a href="{{ $ketos->google_form_kepuasan }}" target="_blank">Lihat Link</a></p>
                            @endif
                        </div>
                    @endif

                    <div class="requirements-section">
                        <h4>Ketentuan Portofolio Program Kerja OSIS:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Portofolio dikumpulkan dalam bentuk file PDF dengan susunan materi yang sistematis dan mudah dipahami</li>
                                <li>Portofolio memuat Program Kerja Inovatif OSIS, baik jangka pendek maupun jangka panjang</li>
                                <li>Setiap program kerja mencakup latar belakang, sasaran kegiatan, dampak/hasil (disertai data atau nominal), serta dokumentasi kegiatan</li>
                                <li>Seluruh program kerja dijelaskan secara rinci, jelas, dan terstruktur</li>
                                <li>Menjelaskan unsur inovasi pada setiap program kerja</li>
                                <li>Menjelaskan nilai kebaruan program, termasuk perbandingan dengan program OSIS pada umumnya atau sebelumnya</li>
                                <li>Menunjukkan proses pengembangan ide (problem → solusi → implementasi)</li>
                                <li>Menyertakan bukti keberlanjutan atau pengembangan program</li>
                                <li>Program kerja mencantumkan periode pelaksanaan kegiatan</li>
                                <li>Desain, tata letak, dan visualisasi portofolio diserahkan kepada masing-masing OSIS dengan memperhatikan kerapihan dan keterbacaan</li>
                                <li>Portofolio terdiri dari minimal 5 halaman dan maksimal 10 halaman</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>Ketentuan Google Form Kepuasan OSIS:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib mengisi dan menyebarkan Google Form resmi dari panitia yang digunakan untuk mengukur tingkat kepuasan dan dampak kepemimpinan OSIS</li>
                                <li>Survei ditujukan kepada 3 kelompok responden, yaitu: (1) siswa umum, (2) anggota OSIS, dan (3) pihak eksternal (misalnya guru, pembina, atau mitra kegiatan)</li>
                                <li>Seluruh respons harus bersifat organik, jujur, dan tidak direkayasa</li>
                                <li>Panitia berhak melakukan verifikasi data responden dan mendiskualifikasi peserta apabila ditemukan indikasi manipulasi</li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('ketos.upload.nomination') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="hidden" name="nomination_type" value="innovation">
                        <h4 style="margin-bottom: 20px; color: #333;">Upload Berkas Outstanding Student Council Innovation</h4>
                        
                        <div class="form-group">
                            <label for="portofolio_program_kerja">Portofolio Program Kerja OSIS (PDF):</label>
                            <input type="file" id="portofolio_program_kerja" name="portofolio_program_kerja" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, Minimal 5 halaman, Maksimal 10 halaman</div>
                        </div>

                        <div class="form-group">
                            <label for="google_form_kepuasan">Link Google Form Kepuasan OSIS (3 Pihak):</label>
                            <input type="url" id="google_form_kepuasan" name="google_form_kepuasan" placeholder="https://forms.google.com/...">
                            <div class="file-info">Masukkan link Google Form yang sudah disebarkan kepada 3 kelompok responden</div>
                        </div>

                        <button type="submit" class="btn-upload">Upload Berkas</button>
                    </form>
                </div>
            </div>

            <!-- Nominasi 2: Leading Student Council Social Impact -->
            <div id="nominasi2" class="content-section">
                <div class="nomination-section">
                    <h2 class="nomination-title">Leading Student Council Social Impact</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($ketos->portofolio_kegiatan_sosial || $ketos->google_form_kepuasan_sosial)
                        <div class="current-files">
                            <h5>Berkas yang Sudah Diupload:</h5>
                            @if($ketos->portofolio_kegiatan_sosial)
                                <p>✅ Portofolio Kegiatan Sosial OSIS: <a href="{{ asset('storage/' . $ketos->portofolio_kegiatan_sosial) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->google_form_kepuasan_sosial)
                                <p>✅ Google Form Kepuasan OSIS (3 Pihak): <a href="{{ $ketos->google_form_kepuasan_sosial }}" target="_blank">Lihat Link</a></p>
                            @endif
                        </div>
                    @endif

                    <div class="requirements-section">
                        <h4>Ketentuan Portofolio Kegiatan Sosial OSIS:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Portofolio dikumpulkan dalam bentuk file PDF dengan susunan materi yang sistematis dan mudah dipahami</li>
                                <li>Portofolio memuat kegiatan sosial yang telah dilaksanakan selama masa kepengurusan OSIS</li>
                                <li>Setiap kegiatan mencantumkan latar belakang, tujuan, dan sasaran kegiatan secara jelas</li>
                                <li>Menjelaskan bentuk kontribusi OSIS dalam perencanaan dan pelaksanaan program</li>
                                <li>Menyertakan dokumentasi kegiatan yang relevan dan representatif</li>
                                <li>Menampilkan dampak kegiatan secara terukur dan spesifik, mencakup: jumlah penerima manfaat, bentuk manfaat yang diberikan, serta perubahan yang dihasilkan</li>
                                <li>Menjelaskan cakupan dampak kegiatan, apakah terbatas pada lingkungan sekolah atau meluas ke masyarakat umum</li>
                                <li>Menguraikan bidang dampak (misalnya: pendidikan, sosial, lingkungan, kesehatan, digital/medsos, dll) serta lokasi atau media pelaksanaan dampak</li>
                                <li>Menyertakan data kuantitatif (misalnya jumlah peserta, penerima manfaat, dana tersalurkan, dll) sebagai bukti dampak</li>
                                <li>Menyertakan bukti pendukung dampak, seperti dokumentasi, testimoni, publikasi media sosial, atau laporan kegiatan</li>
                                <li>Menjelaskan keberlanjutan atau tindak lanjut program sosial</li>
                                <li>Memuat bentuk kerja sama dengan pihak terkait (sponsor, mitra, atau kolaborator), apabila ada</li>
                                <li>Menjelaskan perubahan yang terjadi sebelum dan sesudah program dilaksanakan</li>
                                <li>Mencantumkan periode pelaksanaan kegiatan (waktu/tahun pelaksanaan)</li>
                                <li>Desain, tata letak, dan visualisasi portofolio diserahkan kepada masing-masing OSIS dengan memperhatikan kerapihan dan keterbacaan</li>
                                <li>Jumlah slide minimal 5 slide dan maksimal 10 slide</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>Ketentuan Google Form Kepuasan OSIS (3 Pihak):</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib mengisi dan menyebarkan Google Form resmi dari panitia yang digunakan untuk mengukur tingkat kepuasan dan dampak kepemimpinan OSIS</li>
                                <li>Survei ditujukan kepada 3 kelompok responden, yaitu: (1) siswa umum, (2) anggota OSIS, dan (3) pihak eksternal (misalnya guru, pembina, atau mitra kegiatan)</li>
                                <li>Seluruh respons harus bersifat organik, jujur, dan tidak direkayasa</li>
                                <li>Panitia berhak melakukan verifikasi data responden dan mendiskualifikasi peserta apabila ditemukan indikasi manipulasi</li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('ketos.upload.nomination') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="hidden" name="nomination_type" value="social_impact">
                        <h4 style="margin-bottom: 20px; color: #333;">Upload Berkas Leading Student Council Social Impact</h4>
                        
                        <div class="form-group">
                            <label for="portofolio_kegiatan_sosial">Portofolio Kegiatan Sosial OSIS (PDF):</label>
                            <input type="file" id="portofolio_kegiatan_sosial" name="portofolio_kegiatan_sosial" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, Minimal 5 slide, Maksimal 10 slide</div>
                        </div>

                        <div class="form-group">
                            <label for="google_form_kepuasan_sosial">Link Google Form Kepuasan OSIS (3 Pihak):</label>
                            <input type="url" id="google_form_kepuasan_sosial" name="google_form_kepuasan_sosial" placeholder="https://forms.google.com/...">
                            <div class="file-info">Masukkan link Google Form yang sudah disebarkan kepada 3 kelompok responden</div>
                        </div>

                        <button type="submit" class="btn-upload">Upload Berkas</button>
                    </form>
                </div>
            </div>

            <!-- Nominasi 3: Next-Level Student Council Media -->
            <div id="nominasi3" class="content-section">
                <div class="nomination-section">
                    <h2 class="nomination-title">Next-Level Student Council Media</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($ketos->portofolio_sosial_media || $ketos->google_form_kepuasan_media)
                        <div class="current-files">
                            <h5>Berkas yang Sudah Diupload:</h5>
                            @if($ketos->portofolio_sosial_media)
                                <p>✅ Portofolio Sosial Media: <a href="{{ asset('storage/' . $ketos->portofolio_sosial_media) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->google_form_kepuasan_media)
                                <p>✅ Google Form Kepuasan OSIS (3 Pihak): <a href="{{ $ketos->google_form_kepuasan_media }}" target="_blank">Lihat Link</a></p>
                            @endif
                        </div>
                    @endif

                    <div class="requirements-section">
                        <h4>Ketentuan Portofolio Sosial Media:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Portofolio dikumpulkan dalam bentuk file PDF dengan susunan materi yang sistematis dan mudah dipahami</li>
                                <li>Portofolio memuat identitas akun media sosial OSIS (username, platform, serta periode pengelolaan)</li>
                                <li>Menyertakan ringkasan performa akun (statistik), meliputi jumlah followers, rata-rata views, likes, dan komentar</li>
                                <li>Menampilkan data jangkauan & engagement, disertai penjelasan relevansi dengan jumlah siswa di sekolah</li>
                                <li>Menyertakan bukti statistik akun berupa screenshot insights atau analytics</li>
                                <li>Menampilkan tampilan feed secara keseluruhan (grid layout) untuk menunjukkan konsistensi visual</li>
                                <li>Menyertakan contoh konten, meliputi: struktur kepengurusan, poster kegiatan, dan dokumentasi program kerja</li>
                                <li>Menjelaskan konsep visual & branding, termasuk penggunaan warna, gaya desain, dan identitas visual akun</li>
                                <li>Menampilkan highlight/sorotan akun, dengan desain cover yang konsisten serta kategori yang jelas (misal: Proker, Dokumentasi, Prestasi, dll)</li>
                                <li>Menunjukkan kelengkapan profil akun (foto profil, bio, dan informasi penting lainnya)</li>
                                <li>Menyertakan contoh konten video (reels) yang edukatif atau informatif</li>
                                <li>Menjelaskan konsistensi unggahan, termasuk frekuensi posting feed dan story</li>
                                <li>Menunjukkan interaksi akun dengan audiens, seperti balasan komentar, penggunaan fitur interaktif (poll, Q&A), dan engagement lainnya</li>
                                <li>Desain, tata letak, dan visualisasi portofolio diserahkan kepada masing-masing OSIS dengan memperhatikan kerapihan dan keterbacaan</li>
                                <li>Jumlah slide minimal 6 slide dan maksimal 12 slide</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>Ketentuan Google Form Kepuasan OSIS (3 Pihak):</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib mengisi dan menyebarkan Google Form resmi dari panitia yang digunakan untuk mengukur tingkat kepuasan dan dampak kepemimpinan OSIS</li>
                                <li>Survei ditujukan kepada 3 kelompok responden, yaitu: (1) siswa umum, (2) anggota OSIS, dan (3) pihak eksternal (misalnya guru, pembina, atau mitra kegiatan)</li>
                                <li>Seluruh respons harus bersifat organik, jujur, dan tidak direkayasa</li>
                                <li>Panitia berhak melakukan verifikasi data responden dan mendiskualifikasi peserta apabila ditemukan indikasi manipulasi</li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('ketos.upload.nomination') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="hidden" name="nomination_type" value="media">
                        <h4 style="margin-bottom: 20px; color: #333;">Upload Berkas Next-Level Student Council Media</h4>
                        
                        <div class="form-group">
                            <label for="portofolio_sosial_media">Portofolio Sosial Media (PDF):</label>
                            <input type="file" id="portofolio_sosial_media" name="portofolio_sosial_media" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, Minimal 6 slide, Maksimal 12 slide</div>
                        </div>

                        <div class="form-group">
                            <label for="google_form_kepuasan_media">Link Google Form Kepuasan OSIS (3 Pihak):</label>
                            <input type="url" id="google_form_kepuasan_media" name="google_form_kepuasan_media" placeholder="https://forms.google.com/...">
                            <div class="file-info">Masukkan link Google Form yang sudah disebarkan kepada 3 kelompok responden</div>
                        </div>

                        <button type="submit" class="btn-upload">Upload Berkas</button>
                    </form>
                </div>
            </div>

            <!-- Nominasi 4: Video IG Reels -->
            <div id="nominasi4" class="content-section">
                <div class="nomination-section">
                    <h2 class="nomination-title">Video IG Reels</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($ketos->link_instagram_reels || $ketos->google_form_kepuasan_reels)
                        <div class="current-files">
                            <h5>Berkas yang Sudah Diupload:</h5>
                            @if($ketos->link_instagram_reels)
                                <p>✅ Link Instagram Reels: <a href="{{ $ketos->link_instagram_reels }}" target="_blank">Lihat Video</a></p>
                            @endif
                            @if($ketos->google_form_kepuasan_reels)
                                <p>✅ Google Form Kepuasan OSIS (3 Pihak): <a href="{{ $ketos->google_form_kepuasan_reels }}" target="_blank">Lihat Link</a></p>
                            @endif
                        </div>
                    @endif

                    <div class="requirements-section">
                        <h4>Ketentuan Video IG Reels:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta diwajibkan membuat video berdurasi maksimal 3 menit yang menampilkan profil dan kegiatan OSIS</li>
                                <li>Video wajib mengangkat tema: <strong>"Dari Siswa, Untuk Siswa: Lebih dari Sekadar Organisasi"</strong></li>
                                <li>Seluruh isi video harus merepresentasikan tema secara konsisten, termasuk alur cerita, visual, dan pesan yang disampaikan</li>
                                <li>Video memuat unsur utama: OSIS, sekolah, dan siswa sebagai bagian dari narasi</li>
                                <li>Video menjelaskan visi dan misi OSIS secara jelas dan dikemas sesuai dengan tema</li>
                                <li>Konten video dapat berupa dokumentasi kegiatan, profil pengurus, maupun aktivitas siswa yang dikemas secara kreatif</li>
                                <li>Video diunggah pada akun Instagram resmi OSIS masing-masing sekolah</li>
                                <li>Konten video harus orisinil dan tidak melanggar hak cipta</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>Ketentuan Caption dan Hashtag:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Caption wajib memuat deskripsi singkat mengenai OSIS serta ajakan untuk mendukung</li>
                                <li>Caption wajib mencantumkan hashtag resmi berikut: <strong>#JakartaYouthAchivementAward2026, #OSISJakarta, #OSISBergerak, #DariSiswaUntukSiswa, #LebihDariSekadarOrganisasi</strong></li>
                                <li>Peserta wajib menandai (tag) akun: <strong>@direktorat.sma</strong> dan <strong>@mncuiversity</strong> pada postingan Instagram</li>
                                <li>Peserta wajib mencantumkan link postingan Instagram pada form pengumpulan</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>Ketentuan Penilaian dan Voting:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Periode penilaian (voting) berlangsung hingga <strong>10 April 2026</strong></li>
                                <li>Pemenang ditentukan berdasarkan jumlah likes dan komentar terbanyak (organik) pada postingan video</li>
                                <li>Segala bentuk kecurangan, termasuk pembelian likes, komentar, atau penggunaan bot, akan berakibat diskualifikasi</li>
                                <li>Peserta diperbolehkan mengajak dukungan dari siswa, alumni, maupun masyarakat secara wajar dan organik</li>
                                <li>Panitia berhak melakukan verifikasi terhadap aktivitas engagement akun</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>Ketentuan Google Form Kepuasan OSIS (3 Pihak):</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib mengisi dan menyebarkan Google Form resmi dari panitia yang digunakan untuk mengukur tingkat kepuasan dan dampak kepemimpinan OSIS</li>
                                <li>Survei ditujukan kepada 3 kelompok responden, yaitu: (1) siswa umum, (2) anggota OSIS, dan (3) pihak eksternal (misalnya guru, pembina, atau mitra kegiatan)</li>
                                <li>Seluruh respons harus bersifat organik, jujur, dan tidak direkayasa</li>
                                <li>Panitia berhak melakukan verifikasi data responden dan mendiskualifikasi peserta apabila ditemukan indikasi manipulasi</li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('ketos.upload.nomination') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="hidden" name="nomination_type" value="video_reels">
                        <h4 style="margin-bottom: 20px; color: #333;">Upload Berkas Video IG Reels</h4>
                        
                        <div class="form-group">
                            <label for="link_instagram_reels">Link Postingan Instagram Reels:</label>
                            <input type="url" id="link_instagram_reels" name="link_instagram_reels" placeholder="https://www.instagram.com/p/...">
                            <div class="file-info">Masukkan link postingan Instagram Reels yang sudah diunggah di akun resmi OSIS sekolah</div>
                        </div>

                        <div class="form-group">
                            <label for="google_form_kepuasan_reels">Link Google Form Kepuasan OSIS (3 Pihak):</label>
                            <input type="url" id="google_form_kepuasan_reels" name="google_form_kepuasan_reels" placeholder="https://forms.google.com/...">
                            <div class="file-info">Masukkan link Google Form yang sudah disebarkan kepada 3 kelompok responden</div>
                        </div>

                        <button type="submit" class="btn-upload">Upload Berkas</button>
                    </form>
                </div>
            </div>

            <!-- Nominasi 5: Student Council President of the Year 2026 -->
            <div id="nominasi5" class="content-section">
                <div class="nomination-section">
                    <h2 class="nomination-title">Student Council President of the Year 2026</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($ketos->pas_foto_formal || $ketos->curriculum_vitae || $ketos->fotokopi_rapor || $ketos->video_profil_jakarta || $ketos->portofolio_inovasi || $ketos->esai_solusi_kepemimpinan || $ketos->google_form_kepuasan_president || $ketos->surat_pernyataan_kedisiplinan)
                        <div class="current-files">
                            <h5>Berkas yang Sudah Diupload:</h5>
                            @if($ketos->pas_foto_formal)
                                <p>✅ Pas Foto Formal: <a href="{{ asset('storage/' . $ketos->pas_foto_formal) }}" target="_blank">Lihat Foto</a></p>
                            @endif
                            @if($ketos->curriculum_vitae)
                                <p>✅ Curriculum Vitae (CV): <a href="{{ asset('storage/' . $ketos->curriculum_vitae) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->fotokopi_rapor)
                                <p>✅ Fotokopi Rapor Terakhir: <a href="{{ asset('storage/' . $ketos->fotokopi_rapor) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->video_profil_jakarta)
                                <p>✅ Video Profil "Jakarta Muda Bergerak": <a href="{{ $ketos->video_profil_jakarta }}" target="_blank">Lihat Video</a></p>
                            @endif
                            @if($ketos->portofolio_inovasi)
                                <p>✅ Portofolio Inovasi: <a href="{{ asset('storage/' . $ketos->portofolio_inovasi) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->esai_solusi_kepemimpinan)
                                <p>✅ Esai Solusi Kepemimpinan: <a href="{{ asset('storage/' . $ketos->esai_solusi_kepemimpinan) }}" target="_blank">Lihat File</a></p>
                            @endif
                            @if($ketos->google_form_kepuasan_president)
                                <p>✅ Google Form Kepuasan OSIS (3 Pihak): <a href="{{ $ketos->google_form_kepuasan_president }}" target="_blank">Lihat Link</a></p>
                            @endif
                            @if($ketos->surat_pernyataan_kedisiplinan)
                                <p>✅ Surat Pernyataan Kedisiplinan: <a href="{{ asset('storage/' . $ketos->surat_pernyataan_kedisiplinan) }}" target="_blank">Lihat File</a></p>
                            @endif
                        </div>
                    @endif

                    <div class="requirements-section">
                        <h4>1. Pas Foto Formal:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Foto resmi menggunakan jas OSIS/seragam lengkap dengan latar belakang sesuai ketentuan</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>2. Curriculum Vitae (CV):</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>CV profesional yang mencantumkan riwayat organisasi, pengalaman kepemimpinan, serta prestasi individu</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>3. Fotokopi Rapor Terakhir:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Rapor yang dilampirkan merupakan rapor resmi sekolah selama 1 (satu) tahun terakhir masa menjabat sebagai Ketua OSIS</li>
                                <li>Rapor harus dikeluarkan oleh pihak sekolah, dilengkapi tanda tangan dan/atau stempel resmi sekolah</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>4. Video Profil "Jakarta Muda Bergerak":</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib membuat video berdurasi maksimal 1 menit dalam format .MP4 (1080p)</li>
                                <li>Video harus memuat: (1) pengenalan diri dan jabatan sebagai Ketua OSIS, (2) visi dan misi kepemimpinan, (3) bukti nyata aksi kepemimpinan (program/kegiatan yang telah dilakukan)</li>
                                <li>Video disusun secara komunikatif, terstruktur, dan mencerminkan karakter kepemimpinan, serta disarankan menggunakan pendekatan storytelling</li>
                                <li>Struktur video minimal mencakup: pembukaan, visi & misi, aksi nyata, dan penutup</li>
                                <li>Video wajib diunggah pada akun media sosial pribadi Ketua OSIS (Instagram/TikTok)</li>
                                <li>Video harus orisinil, tidak melanggar hak cipta, serta tidak mengandung konten yang tidak pantas</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>5. Portofolio Inovasi (PDF):</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib menyusun portofolio sebanyak 3–5 halaman yang memuat program kerja unggulan selama masa kepemimpinan</li>
                                <li>Setiap program wajib mencakup: (1) latar belakang & tujuan, (2) konsep inovasi/kebaruan, (3) deskripsi pelaksanaan, (4) dokumentasi kegiatan, (5) dampak terukur (jumlah peserta/penerima manfaat/nominal), (6) testimoni pihak eksternal</li>
                                <li>Portofolio harus menunjukkan peran aktif peserta sebagai Ketua OSIS dalam program tersebut</li>
                                <li>Disusun secara ringkas, jelas, sistematis, dan berbasis data</li>
                                <li>Desain memperhatikan kerapihan, keterbacaan, dan visual yang profesional</li>
                                <li>Portofolio harus orisinil dan dapat dipertanggungjawabkan</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>6. Esai Solusi Kepemimpinan:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Tema: <strong>"Mewujudkan OSIS yang Inklusif: Menghapus Budaya Eksklusivitas dan Circle dalam Organisasi Siswa"</strong></li>
                                <li>Esai memuat: latar belakang, analisis masalah, solusi konkret, langkah implementasi, serta dampak yang diharapkan</li>
                                <li>Panjang esai 500–1.000 kata, ditulis secara sistematis dan argumentatif</li>
                                <li>Esai harus orisinil dan dikumpulkan dalam format PDF</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>7. Google Form Kepuasan OSIS (3 Pihak):</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Peserta wajib mengisi dan menyebarkan Google Form resmi dari panitia yang digunakan untuk mengukur tingkat kepuasan dan dampak kepemimpinan OSIS</li>
                                <li>Survei ditujukan kepada 3 kelompok responden, yaitu: (1) siswa umum, (2) anggota OSIS, dan (3) pihak eksternal (misalnya guru, pembina, atau mitra kegiatan)</li>
                                <li>Seluruh respons harus bersifat organik, jujur, dan tidak direkayasa</li>
                                <li>Panitia berhak melakukan verifikasi data responden dan mendiskualifikasi peserta apabila ditemukan indikasi manipulasi</li>
                            </ul>
                        </div>
                    </div>

                    <div class="requirements-section">
                        <h4>8. Surat Pernyataan Kedisiplinan:</h4>
                        <div class="requirements-list">
                            <ul>
                                <li>Surat resmi dari sekolah yang menyatakan peserta tidak memiliki catatan pelanggaran</li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('ketos.upload.nomination') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="hidden" name="nomination_type" value="president">
                        <h4 style="margin-bottom: 20px; color: #333;">Upload Berkas Student Council President of the Year 2026</h4>
                        
                        <div class="form-group">
                            <label for="pas_foto_formal">Pas Foto Formal (JPG/PNG):</label>
                            <input type="file" id="pas_foto_formal" name="pas_foto_formal" accept=".jpg,.jpeg,.png">
                            <div class="file-info">Format: JPG/PNG, Maksimal 2MB, menggunakan jas OSIS/seragam lengkap</div>
                        </div>

                        <div class="form-group">
                            <label for="curriculum_vitae">Curriculum Vitae (CV) - PDF:</label>
                            <input type="file" id="curriculum_vitae" name="curriculum_vitae" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, CV profesional dengan riwayat organisasi dan prestasi</div>
                        </div>

                        <div class="form-group">
                            <label for="fotokopi_rapor">Fotokopi Rapor Terakhir (PDF):</label>
                            <input type="file" id="fotokopi_rapor" name="fotokopi_rapor" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, rapor resmi 1 tahun terakhir dengan stempel sekolah</div>
                        </div>

                        <div class="form-group">
                            <label for="video_profil_jakarta">Link Video Profil "Jakarta Muda Bergerak":</label>
                            <input type="url" id="video_profil_jakarta" name="video_profil_jakarta" placeholder="https://www.instagram.com/p/... atau https://www.tiktok.com/@...">
                            <div class="file-info">Link video di media sosial pribadi, maksimal 1 menit, format MP4 1080p</div>
                        </div>

                        <div class="form-group">
                            <label for="portofolio_inovasi">Portofolio Inovasi (PDF):</label>
                            <input type="file" id="portofolio_inovasi" name="portofolio_inovasi" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, 3-5 halaman program kerja unggulan</div>
                        </div>

                        <div class="form-group">
                            <label for="esai_solusi_kepemimpinan">Esai Solusi Kepemimpinan (PDF):</label>
                            <input type="file" id="esai_solusi_kepemimpinan" name="esai_solusi_kepemimpinan" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, 500-1000 kata tentang OSIS yang Inklusif</div>
                        </div>

                        <div class="form-group">
                            <label for="google_form_kepuasan_president">Link Google Form Kepuasan OSIS (3 Pihak):</label>
                            <input type="url" id="google_form_kepuasan_president" name="google_form_kepuasan_president" placeholder="https://forms.google.com/...">
                            <div class="file-info">Masukkan link Google Form yang sudah disebarkan kepada 3 kelompok responden</div>
                        </div>

                        <div class="form-group">
                            <label for="surat_pernyataan_kedisiplinan">Surat Pernyataan Kedisiplinan (PDF):</label>
                            <input type="file" id="surat_pernyataan_kedisiplinan" name="surat_pernyataan_kedisiplinan" accept=".pdf">
                            <div class="file-info">Format: PDF, Maksimal 5MB, surat resmi dari sekolah tentang kedisiplinan</div>
                        </div>

                        <button type="submit" class="btn-upload">Upload Berkas</button>
                    </form>
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
            
            const selectedSection = document.getElementById(sectionId);
            if(selectedSection) {
                selectedSection.classList.add('active');
            }
            
            const clickedItem = document.querySelector(`[data-section="${sectionId}"]`);
            if(clickedItem) {
                clickedItem.classList.add('active');
            }
        }

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Data Tersimpan!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#10b981',
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
                text: '{{ session('error') ?? "Periksa kembali isian dan dokumen yang Anda unggah." }}',
                confirmButtonColor: '#e53e3e',
            });
        @endif
    </script>
</body>
</html>