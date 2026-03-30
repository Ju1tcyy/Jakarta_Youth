<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Organisasi - Youth Generation</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .main-container {
            display: flex;
            flex: 1;
        }
        
        .sidebar {
            width: 280px;
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            padding: 0;
            min-height: calc(100vh - 80px);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 25px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .sidebar-header h3 {
            color: #e53e3e;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
        }
        
        .sidebar-menu li {
            border-bottom: 1px solid #f0f0f0;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 18px 25px;
            color: #666;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .sidebar-menu a:hover {
            background: #f8f9fa;
            color: #e53e3e;
        }
        
        .sidebar-menu a.active {
            background: #e53e3e;
            color: white;
            border-right: 3px solid #c53030;
        }
        
        .sidebar-footer {
            padding: 20px 25px;
            border-top: 1px solid #f0f0f0;
            background: #f8f9fa;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .user-info-sidebar {
            flex: 1;
        }
        
        .user-info-sidebar .name {
            font-weight: 600;
            color: #333;
            font-size: 14px;
            margin-bottom: 2px;
        }
        
        .user-info-sidebar .school {
            font-size: 12px;
            color: #666;
        }
        
        .btn-logout-sidebar {
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 12px;
            transition: background 0.3s;
        }
        
        .btn-logout-sidebar:hover {
            background: #c82333;
            color: white;
        }
        
        .content-area {
            flex: 1;
            padding: 30px;
        }
        
        .content-section {
            display: none;
        }
        
        .content-section.active {
            display: block;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                min-height: auto;
                order: 2;
            }
            
            .content-area {
                padding: 15px;
                order: 1;
            }
            
            .header {
                padding: 15px 3%;
                flex-direction: column;
                text-align: center;
            }
            
            .header .logo {
                margin-bottom: 10px;
            }
            
            .header .logo img {
                height: 60px;
                margin-right: 10px;
            }
            
            .header h1 {
                font-size: 1.2rem;
            }
            
            .sidebar-menu a {
                padding: 15px 20px;
                font-size: 14px;
            }
            
            .sidebar-footer {
                padding: 15px 20px;
            }
            
            .user-profile {
                padding: 12px;
            }
            
            .user-info-sidebar .name {
                font-size: 13px;
            }
            
            .user-info-sidebar .school {
                font-size: 11px;
            }
            
            .btn-logout-sidebar {
                padding: 6px 10px;
                font-size: 11px;
            }
            
            .welcome-card, .documents-section {
                padding: 20px;
                margin-bottom: 15px;
            }
            
            .documents-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .document-card {
                padding: 15px;
            }
            
            .form-group input {
                padding: 10px;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            .content-area {
                padding: 10px;
            }
            
            .header {
                padding: 10px 2%;
            }
            
            .header .logo img {
                height: 50px;
            }
            
            .sidebar-header {
                padding: 20px;
            }
            
            .sidebar-menu a {
                padding: 12px 15px;
                font-size: 13px;
            }
            
            .welcome-card, .documents-section {
                padding: 15px;
            }
            
            .document-card {
                padding: 12px;
            }
            
            .document-card h4 {
                font-size: 16px;
            }
        }
        
        .header {
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            color: white;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header .logo {
            display: flex;
            align-items: center;
        }
        
        .header .logo img {
            height: 100px;
            width: auto;
            margin-right: 20px;
        }
        
        .header h1 {
            font-size: 1.5rem;
        }
        
        .header .user-info {
            text-align: right;
        }
        
        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .documents-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .document-card {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            transition: border-color 0.3s;
        }
        
        .document-card.completed {
            border-color: #28a745;
            background: #f8fff9;
        }
        
        .document-card h4 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .document-status {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .status-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .status-icon.completed {
            background: #28a745;
        }
        
        .status-icon.pending {
            background: #ffc107;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
        }
        
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            background: #f8f9fa;
        }
        
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-logout {
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .file-link {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }
        
        .file-link:hover {
            text-decoration: underline;
        }
        
        small {
            color: #666;
            font-size: 12px;
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
                <li><a href="#" onclick="showSection('dashboard')" class="menu-item active" data-section="dashboard">🏠 Dashboard</a></li>
                <li><a href="#" onclick="showSection('documents')" class="menu-item" data-section="documents">📄 Upload Dokumen</a></li>
                <li><a href="#" onclick="showSection('profile')" class="menu-item" data-section="profile">👤 Informasi Organisasi</a></li>
            </ul>
            
            <!-- Sidebar Footer with User Profile and Logout -->
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-info-sidebar">
                        <div class="name">{{ $organisasi->nama_organisasi }}</div>
                        <div class="school">{{ $organisasi->nama_sekolah }}</div>
                    </div>
                    <a href="{{ route('organisasi.logout') }}" class="btn-logout-sidebar">Logout</a>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Dashboard Section -->
            <div id="dashboard" class="content-section active">
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
                                <div class="document-status">
                                    <div class="status-icon {{ $organisasi->surat_rekomendasi ? 'completed' : 'pending' }}"></div>
                                    <span>{{ $organisasi->surat_rekomendasi ? 'Sudah diupload' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->surat_rekomendasi)
                                    <a href="{{ Storage::url($organisasi->surat_rekomendasi) }}" target="_blank" class="file-link">
                                        📄 Lihat dokumen yang sudah diupload
                                    </a>
                                    <br><br>
                                @endif
                                
                                <div class="form-group">
                                    <label for="surat_rekomendasi">Upload Dokumen PDF:</label>
                                    <input type="file" id="surat_rekomendasi" name="surat_rekomendasi" accept=".pdf">
                                    <small>Format: PDF, Maksimal 2MB</small>
                                </div>
                            </div>

                            <!-- Struktur Kepengurusan -->
                            <div class="document-card {{ $organisasi->struktur_kepengurusan ? 'completed' : '' }}">
                                <h4>Struktur Kepengurusan & Daftar Kabinet</h4>
                                <div class="document-status">
                                    <div class="status-icon {{ $organisasi->struktur_kepengurusan ? 'completed' : 'pending' }}"></div>
                                    <span>{{ $organisasi->struktur_kepengurusan ? 'Sudah diupload' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->struktur_kepengurusan)
                                    <a href="{{ Storage::url($organisasi->struktur_kepengurusan) }}" target="_blank" class="file-link">
                                        📄 Lihat dokumen yang sudah diupload
                                    </a>
                                    <br><br>
                                @endif
                                
                                <div class="form-group">
                                    <label for="struktur_kepengurusan">Upload Dokumen PDF:</label>
                                    <input type="file" id="struktur_kepengurusan" name="struktur_kepengurusan" accept=".pdf">
                                    <small>Format: PDF, Maksimal 2MB</small>
                                </div>
                            </div>

                            <!-- Bukti Share IG -->
                            <div class="document-card {{ $organisasi->bukti_share_ig ? 'completed' : '' }}">
                                <h4>Screenshot Bukti Share IG Story (10 orang)</h4>
                                <div class="document-status">
                                    <div class="status-icon {{ $organisasi->bukti_share_ig ? 'completed' : 'pending' }}"></div>
                                    <span>{{ $organisasi->bukti_share_ig ? 'Sudah diupload' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->bukti_share_ig)
                                    <a href="{{ Storage::url($organisasi->bukti_share_ig) }}" target="_blank" class="file-link">
                                        🖼️ Lihat screenshot yang sudah diupload
                                    </a>
                                    <br><br>
                                @endif
                                
                                <div class="form-group">
                                    <label for="bukti_share_ig">Upload Screenshot JPG:</label>
                                    <input type="file" id="bukti_share_ig" name="bukti_share_ig" accept=".jpg,.jpeg,.png">
                                    <small>Format: JPG/PNG, Maksimal 2MB</small>
                                </div>
                            </div>

                            <!-- Bukti Repost IG -->
                            <div class="document-card {{ $organisasi->bukti_repost_ig ? 'completed' : '' }}">
                                <h4>Screenshot Bukti Repost IG Feeds (10 orang)</h4>
                                <div class="document-status">
                                    <div class="status-icon {{ $organisasi->bukti_repost_ig ? 'completed' : 'pending' }}"></div>
                                    <span>{{ $organisasi->bukti_repost_ig ? 'Sudah diupload' : 'Belum diupload' }}</span>
                                </div>
                                
                                @if($organisasi->bukti_repost_ig)
                                    <a href="{{ Storage::url($organisasi->bukti_repost_ig) }}" target="_blank" class="file-link">
                                        🖼️ Lihat screenshot yang sudah diupload
                                    </a>
                                    <br><br>
                                @endif
                                
                                <div class="form-group">
                                    <label for="bukti_repost_ig">Upload Screenshot JPG:</label>
                                    <input type="file" id="bukti_repost_ig" name="bukti_repost_ig" accept=".jpg,.jpeg,.png">
                                    <small>Format: JPG/PNG, Maksimal 2MB</small>
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center; margin-top: 30px;">
                            <button type="submit" class="btn">Upload Dokumen</button>
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
        function showSection(sectionId) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            
            // Remove active class from all menu items
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to clicked menu item
            const clickedItem = document.querySelector(`[data-section="${sectionId}"]`);
            clickedItem.classList.add('active');
        }
    </script>
</body>
</html>