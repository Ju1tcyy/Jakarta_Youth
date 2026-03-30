<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Organisasi - Youth Generation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            height: 40px;
            margin-right: 10px;
        }
        
        .header h1 {
            font-size: 1.5rem;
        }
        
        .header .user-info {
            text-align: right;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
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
            <img src="{{ asset('icon/logo jyaa.png') }}" alt="Youth Generation Logo">
            <h1>Dashboard Organisasi</h1>
        </div>
        <div class="user-info">
            <p>{{ $organisasi->nama_organisasi }}</p>
            <p style="font-size: 14px; opacity: 0.8;">{{ $organisasi->nama_sekolah }}</p>
            <a href="{{ route('organisasi.logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome-card">
            <h2>Selamat Datang, {{ $organisasi->nama_organisasi }}!</h2>
            <p>Silakan lengkapi dokumen-dokumen berikut untuk melengkapi pendaftaran Anda.</p>
        </div>

        <div class="documents-section">
            <h3>Kelengkapan Dokumen</h3>
            
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
</body>
</html>