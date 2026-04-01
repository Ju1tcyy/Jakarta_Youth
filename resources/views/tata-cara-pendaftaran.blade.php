<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Cara Pendaftaran - Jakarta Youth Achievement Award 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* Navbar */
        nav {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        nav .logo {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #e53e3e;
            min-height: 80px;
        }
        
        nav .logo img {
            height: 80px;
            width: auto;
            display: block;
            object-fit: contain;
            margin-right: 15px;
            max-width: none;
            opacity: 1;
            visibility: visible;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        
        nav a:hover {
            color: #e53e3e;
        }

        /* Main Content */
        .main-content {
            margin-top: 120px;
            padding: 2rem 5%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .header-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header-section img {
            height: 100px;
            width: auto;
            margin-bottom: 1rem;
        }

        .header-section h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #e53e3e;
            margin-bottom: 0.5rem;
        }

        .header-section p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
        }

        /* Content Cards */
        .content-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-left: 5px solid #e53e3e;
        }

        .content-card h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e53e3e;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .content-card h2::before {
            content: "📋";
            margin-right: 0.5rem;
            font-size: 1.5rem;
        }

        .step-item {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #dd6b20;
        }

        .step-item h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .step-number {
            background: #e53e3e;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 1rem;
            font-size: 0.9rem;
        }

        .step-item p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 0.5rem;
        }

        .highlight-box {
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            margin: 1.5rem 0;
        }

        .highlight-box h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .highlight-box p {
            opacity: 0.9;
        }

        /* Action Buttons */
        .action-buttons {
            text-align: center;
            margin: 3rem 0;
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            margin: 0.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(229, 62, 62, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #e53e3e;
            border: 2px solid #e53e3e;
        }

        .btn-secondary:hover {
            background: #e53e3e;
            color: white;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                padding: 0.5rem 3%;
            }
            
            nav ul {
                display: none;
            }
            
            nav .logo {
                font-size: 1rem;
                min-height: 70px;
            }
            
            nav .logo img {
                height: 60px;
                margin-right: 10px;
            }

            .main-content {
                margin-top: 100px;
                padding: 1rem 3%;
            }

            .header-section h1 {
                font-size: 2rem;
            }

            .content-card {
                padding: 1.5rem;
            }

            .step-item {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            nav .logo img {
                height: 50px;
                margin-right: 8px;
            }

            .header-section h1 {
                font-size: 1.6rem;
            }

            .content-card h2 {
                font-size: 1.5rem;
            }

            .step-item h3 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo">
                Youth Generation
            </div>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('tata-cara-pendaftaran') }}">Tata Cara</a></li>
                <li><a href="{{ route('home') }}#registration">Registration</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header Section -->
        <div class="header-section">
            <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo">
            <h1>Tata Cara Pendaftaran</h1>
            <p>Jakarta Youth Achievement Award 2026</p>
        </div>

        <!-- Content -->
        <div class="content-card">
            <h2>Tata Cara Pendaftaran</h2>
            
            <div class="step-item">
                <h3><span class="step-number">1</span>Gunakan Data yang Konsisten</h3>
                <p>Pastikan seluruh data yang digunakan (nama sekolah, nama organisasi/OSIS, serta identitas lainnya) ditulis secara konsisten pada setiap tahap pendaftaran untuk menghindari kendala dalam proses verifikasi.</p>
                
                <div class="highlight-box">
                    <h4>⚠️ Penting!</h4>
                    <p>Konsistensi data sangat penting untuk kelancaran proses verifikasi. Pastikan ejaan nama sekolah dan organisasi sama persis di setiap form.</p>
                </div>
            </div>

            <div class="step-item">
                <h3><span class="step-number">2</span>Tahap 1 – Pendaftaran Organisasi (OSIS)</h3>
                <p>Peserta wajib melakukan pendaftaran organisasi terlebih dahulu melalui menu <strong>"Daftarkan OSIS"</strong>.</p>
                <p>Pada tahap ini, OSIS diminta untuk mengisi data organisasi serta mengunggah berkas wajib sesuai dengan ketentuan yang telah ditetapkan oleh panitia.</p>
                
                <div style="background: #e8f5e8; padding: 1rem; border-radius: 10px; margin-top: 1rem;">
                    <h4 style="color: #2d5a2d; margin-bottom: 0.5rem;">📄 Berkas yang Diperlukan:</h4>
                    <ul style="color: #2d5a2d; margin-left: 1rem;">
                        <li>Surat Rekomendasi Sekolah (dengan kop surat resmi)</li>
                        <li>Struktur Kepengurusan & Kabinet (dengan kop surat resmi)</li>
                        <li>Screenshot Bukti Share IG Story (10 orang)</li>
                        <li>Screenshot Bukti Repost IG Feeds (10 orang)</li>
                    </ul>
                </div>
            </div>

            <div class="step-item">
                <h3><span class="step-number">3</span>Tahap 2 – Pendaftaran Nominasi</h3>
                <p>Setelah menyelesaikan pendaftaran organisasi, peserta dapat melanjutkan ke tahap berikutnya melalui menu <strong>"Nominasi OSIS"</strong>.</p>
                <p>Pada tahap ini, peserta dapat memilih kategori nominasi yang diikuti serta mengunggah berkas pendukung sesuai dengan kategori yang dipilih.</p>
                
                <div style="background: #fff3e0; padding: 1rem; border-radius: 10px; margin-top: 1rem;">
                    <h4 style="color: #e65100; margin-bottom: 0.5rem;">🏆 Kategori Nominasi:</h4>
                    <ul style="color: #e65100; margin-left: 1rem;">
                        <li>Outstanding Student Council Innovation</li>
                        <li>Leading Student Council Social Impact</li>
                        <li>Next-Level Student Council Media</li>
                        <li>Video IG Reels</li>
                        <li>Student Council President of the Year 2026</li>
                    </ul>
                </div>
            </div>

            <div class="step-item">
                <h3><span class="step-number">4</span>Verifikasi dan Konfirmasi</h3>
                <p>Pastikan seluruh data dan dokumen yang diunggah telah lengkap dan sesuai.</p>
                <p>Tim panitia akan melakukan verifikasi terhadap semua berkas yang telah diunggah. Pastikan semua dokumen memenuhi persyaratan yang telah ditetapkan.</p>
                
                <div class="highlight-box">
                    <h4>✅ Checklist Akhir</h4>
                    <p>Sebelum submit, pastikan semua berkas sudah terupload dengan benar dan Google Form kepuasan sudah diisi untuk setiap kategori nominasi yang dipilih.</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('home') }}#registration" class="btn btn-primary">Mulai Pendaftaran</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Jakarta Youth Achievement Award. All rights reserved.</p>
    </footer>
</body>
</html>