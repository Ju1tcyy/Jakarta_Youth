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

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            background: var(--white);
            cursor: pointer;
            transition: var(--transition);
        }

        input[type="file"]:hover {
            border-color: var(--primary);
            background: rgba(229, 62, 62, 0.02);
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

        /* Notice banner removal */
        .alert {
            display: none !important; 
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
            <img src="{{ asset('icon/logo collab.png') }}" alt="Youth Generation Logo">
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
                <li><a href="#" onclick="showSection('profile')" class="menu-item" data-section="profile"><i data-feather="info"></i> Informasi Organisasi</a></li>
            </ul>
            
            <!-- Sidebar Footer with User Profile and Logout -->
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-info-sidebar">
                        <div class="name">{{ $organisasi->nama_organisasi }}</div>
                        <div class="school">{{ $organisasi->nama_sekolah }}</div>
                    </div>
                    <a href="{{ route('organisasi.logout') }}" class="btn-logout-sidebar" title="Logout">
                        <i data-feather="log-out" style="width:16px;"></i>
                    </a>
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
                
                @if(session('success'))
                    <div class="alert">
                        {{ session('success') }}
                    </div>
                @endif

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
                            <div class="document-status">
                                <div class="status-icon {{ $organisasi->surat_rekomendasi ? 'completed' : 'pending' }}"></div>
                                <span>{{ $organisasi->surat_rekomendasi ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ $organisasi->struktur_kepengurusan ? 'completed' : '' }}">
                            <h4>Struktur Kepengurusan</h4>
                            <div class="document-status">
                                <div class="status-icon {{ $organisasi->struktur_kepengurusan ? 'completed' : 'pending' }}"></div>
                                <span>{{ $organisasi->struktur_kepengurusan ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ $organisasi->bukti_share_ig ? 'completed' : '' }}">
                            <h4>Bukti Share IG Story</h4>
                            <div class="document-status">
                                <div class="status-icon {{ $organisasi->bukti_share_ig ? 'completed' : 'pending' }}"></div>
                                <span>{{ $organisasi->bukti_share_ig ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>

                        <div class="document-card {{ $organisasi->bukti_repost_ig ? 'completed' : '' }}">
                            <h4>Bukti Repost IG Feeds</h4>
                            <div class="document-status">
                                <div class="status-icon {{ $organisasi->bukti_repost_ig ? 'completed' : 'pending' }}"></div>
                                <span>{{ $organisasi->bukti_repost_ig ? 'Sudah diupload' : 'Belum diupload' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Section -->
            <div id="documents" class="content-section">
                @if(session('success'))
                    <div class="alert">
                        {{ session('success') }}
                    </div>
                @endif

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
                                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin-bottom: 10px; border-left: 4px solid #e53e3e;">
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
                                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin-bottom: 10px; border-left: 4px solid #e53e3e;">
                                        <strong>Catatan Penting:</strong><br>
                                        Surat menggunakan kop surat resmi sekolah, dilengkapi tanda tangan kepala sekolah serta cap/stempel sekolah
                                    </div>
                                    <input type="file" id="struktur_kepengurusan" name="struktur_kepengurusan" accept=".pdf">
                                    <small>Format: PDF, Maks 2MB</small>
                                </div>
                            </div>

                            <!-- Bukti Share IG -->
                            <div class="document-card {{ $organisasi->bukti_share_ig ? 'completed' : '' }}">
                                <h4>Screenshot Share IG Story</h4>
                                <div class="document-status {{ $organisasi->bukti_share_ig ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->bukti_share_ig ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->bukti_share_ig ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->bukti_share_ig)
                                    <a href="{{ Storage::url($organisasi->bukti_share_ig) }}" target="_blank" class="file-link">
                                        <i data-feather="image" style="width:16px;"></i> Lihat gambar tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="bukti_share_ig">Upload Gambar JPG/PNG:</label>
                                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin-bottom: 10px; border-left: 4px solid #e53e3e;">
                                        <strong>Catatan Penting:</strong><br>
                                        Screenshot menampilkan nama akun dan postingan secara jelas serta masih tersedia (belum dihapus)
                                    </div>
                                    <input type="file" id="bukti_share_ig" name="bukti_share_ig" accept=".jpg,.jpeg,.png">
                                    <small>Format: JPG/PNG, Maks 2MB</small>
                                </div>
                            </div>

                            <!-- Bukti Repost IG -->
                            <div class="document-card {{ $organisasi->bukti_repost_ig ? 'completed' : '' }}">
                                <h4>Screenshot Repost IG Feeds</h4>
                                <div class="document-status {{ $organisasi->bukti_repost_ig ? 'completed' : 'pending' }}">
                                    <i data-feather="{{ $organisasi->bukti_repost_ig ? 'check-circle' : 'clock' }}"></i>
                                    <span>{{ $organisasi->bukti_repost_ig ? 'Selesai' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->bukti_repost_ig)
                                    <a href="{{ Storage::url($organisasi->bukti_repost_ig) }}" target="_blank" class="file-link">
                                        <i data-feather="image" style="width:16px;"></i> Lihat gambar tersimpan
                                    </a>
                                @endif
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="bukti_repost_ig">Upload Gambar JPG/PNG:</label>
                                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin-bottom: 10px; border-left: 4px solid #e53e3e;">
                                        <strong>Catatan Penting:</strong><br>
                                        Screenshot menampilkan nama akun dan postingan secara jelas serta masih tersedia (belum dihapus)
                                    </div>
                                    <input type="file" id="bukti_repost_ig" name="bukti_repost_ig" accept=".jpg,.jpeg,.png">
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
                                {{ $organisasi->email }}
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