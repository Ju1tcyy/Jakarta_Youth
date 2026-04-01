<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - Jakarta Youth Achievement Award 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .success-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
            padding: 40px;
            text-align: center;
        }

        .success-icon {
            font-size: 4rem;
            color: #22c55e;
            margin-bottom: 1rem;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            height: 80px;
            width: auto;
            margin-bottom: 15px;
        }

        .success-container h1 {
            color: #22c55e;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .success-container p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .whatsapp-section {
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin: 2rem 0;
        }

        .whatsapp-section h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .whatsapp-section h3::before {
            content: "💬";
            margin-right: 0.5rem;
            font-size: 1.5rem;
        }

        .whatsapp-section p {
            color: rgba(255,255,255,0.9);
            margin-bottom: 1.5rem;
        }

        .whatsapp-btn {
            display: inline-block;
            background: white;
            color: #25d366;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background: #f0f0f0;
        }

        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #e53e3e;
            padding: 1.5rem;
            border-radius: 10px;
            margin: 2rem 0;
            text-align: left;
        }

        .info-box h4 {
            color: #e53e3e;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .info-box ul {
            color: #555;
            margin-left: 1rem;
        }

        .info-box li {
            margin-bottom: 0.5rem;
        }

        .action-buttons {
            margin-top: 2rem;
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

        /* Responsive */
        @media (max-width: 768px) {
            .success-container {
                padding: 30px 20px;
            }
            
            .success-container h1 {
                font-size: 1.6rem;
            }
            
            .whatsapp-section {
                padding: 1.5rem;
            }
            
            .whatsapp-btn {
                padding: 0.8rem 1.5rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .success-container h1 {
                font-size: 1.4rem;
            }
            
            .success-container p {
                font-size: 1rem;
            }
            
            .btn {
                display: block;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✅</div>
        
        <div class="logo">
            <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo">
        </div>

        <h1>Pendaftaran Berhasil!</h1>
        <p>Selamat! Anda telah berhasil mendaftar sebagai <strong>{{ ucfirst($role) }}</strong> dalam Jakarta Youth Achievement Award 2026.</p>

        <div class="whatsapp-section">
            <h3>Bergabung dengan Grup WhatsApp</h3>
            <p>Untuk mendapatkan informasi terbaru, update penting, dan berkomunikasi dengan peserta lain, silakan bergabung dengan grup WhatsApp resmi kami.</p>
            
            <a href="https://chat.whatsapp.com/Fekw3W5wn7y4w9Cqj9nuJ5?mode=gi_t" target="_blank" class="whatsapp-btn">
                📱 Bergabung ke Grup WhatsApp
            </a>
            
            <p style="font-size: 0.9rem; opacity: 0.8;">Klik tombol di atas untuk langsung bergabung</p>
        </div>

        <div class="info-box">
            <h4>📋 Langkah Selanjutnya:</h4>
            <ul>
                <li>Bergabung dengan grup WhatsApp untuk mendapatkan update terbaru</li>
                <li>Login ke dashboard Anda untuk melengkapi berkas pendaftaran</li>
                <li>Upload dokumen yang diperlukan sesuai kategori Anda</li>
                <li>Pantau status verifikasi berkas secara berkala</li>
                <li>Ikuti timeline seleksi yang telah ditentukan</li>
            </ul>
        </div>

        <div class="action-buttons">
            @if($role === 'ketos')
                <a href="{{ route('ketos.dashboard') }}" class="btn btn-primary">Masuk ke Dashboard Ketos</a>
            @elseif($role === 'organisasi')
                <a href="{{ route('organisasi.dashboard') }}" class="btn btn-primary">Masuk ke Dashboard Organisasi</a>
            @endif
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>