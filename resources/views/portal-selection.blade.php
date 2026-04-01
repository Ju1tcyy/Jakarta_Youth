<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Portal - Jakarta Youth Achievement Award 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header img {
            height: 100px;
            width: auto;
            margin-bottom: 1rem;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .portals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .portal-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .portal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .portal-card.admin {
            border-color: #667eea;
        }

        .portal-card.admin:hover {
            border-color: #667eea;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
        }

        .portal-card.organisasi {
            border-color: #e53e3e;
        }

        .portal-card.organisasi:hover {
            border-color: #e53e3e;
            box-shadow: 0 20px 40px rgba(229, 62, 62, 0.2);
        }

        .portal-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .portal-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #333;
        }

        .portal-card p {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .portal-btn {
            display: inline-block;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
        }

        .portal-btn.admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .portal-btn.organisasi {
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            color: white;
        }

        .portal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .back-link {
            text-align: center;
            margin-top: 2rem;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .portals-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .portal-card {
                padding: 1.5rem;
            }

            .portal-icon {
                font-size: 3rem;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.6rem;
            }

            .header img {
                height: 80px;
            }

            .portal-card h3 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo">
            <h1>Pilih Portal Akses</h1>
            <p>Jakarta Youth Achievement Award 2026</p>
        </div>

        <div class="portals-grid">
            <!-- Admin Portal -->
            <div class="portal-card admin">
                <div class="portal-icon">🛡️</div>
                <h3>Portal Admin</h3>
                <p>Akses khusus untuk administrator sistem. Kelola data peserta, verifikasi berkas, dan pantau seluruh proses seleksi.</p>
                <a href="{{ route('admin.login') }}" class="portal-btn admin">
                    Masuk ke Portal Admin
                </a>
            </div>

            <!-- Organisasi Portal -->
            <div class="portal-card organisasi">
                <div class="portal-icon">🏫</div>
                <h3>Portal Organisasi</h3>
                <p>Portal untuk sekolah dan organisasi. Upload dokumen persyaratan dan kelola data organisasi OSIS.</p>
                <a href="{{ route('organisasi.login') }}" class="portal-btn organisasi">
                    Masuk ke Portal Organisasi
                </a>
            </div>
        </div>

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
