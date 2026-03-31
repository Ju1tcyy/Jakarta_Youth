<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Youth Achievement Award 2026</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #e53e3e;
            --primary-light: #fee2e2;
            --secondary: #dd6b20;
            --secondary-light: #ffedd5;
            --dark: #0f172a;
            --slate: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Inter', sans-serif;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            color: var(--dark);
            background-color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Asset Decorations - REAL VISIBILITY */
        .decoration-ondel {
            position: absolute;
            z-index: 1;
            width: 280px;
            pointer-events: none;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.05));
        }

        .decoration-star {
            position: absolute;
            z-index: 1;
            width: 80px;
            pointer-events: none;
            animation: pulse-star 4s ease-in-out infinite;
        }

        @keyframes pulse-star {

            0%,
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 0.8;
            }

            50% {
                transform: scale(1.2) rotate(15deg);
                opacity: 1;
            }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 120px; /* Increased to fit larger logo */
            display: flex;
            align-items: center;
            padding: 0 5%;
            transition: var(--transition);
        }

        nav.scrolled {
            height: 85px; /* Increased from 70px */
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
        }

        .nav-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--dark);
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.2rem;
        }

        .logo img {
            height: 90px; /* Greatly Increased from 65px */
            width: auto;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--slate);
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-cta {
            padding: 10px 24px;
            background: var(--primary);
            color: white !important;
            border-radius: 12px;
            font-family: var(--font-heading);
            font-weight: 700;
            box-shadow: 0 10px 20px -5px rgba(229, 62, 62, 0.3);
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 5% 80px;
            background: radial-gradient(circle at 90% 10%, var(--secondary-light), transparent 40%),
                radial-gradient(circle at 10% 90%, var(--primary-light), transparent 40%);
            overflow: hidden;
        }

        .hero-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 5;
        }

        .hero-text h1 {
            font-family: var(--font-heading);
            font-size: 4.8rem;
            line-height: 1;
            font-weight: 900;
            letter-spacing: -2.5px;
            margin-bottom: 24px;
            position: relative;
        }

        .hero-text h1 span {
            color: var(--primary);
        }

        .hero-text p {
            font-size: 1.3rem;
            color: var(--slate);
            margin-bottom: 40px;
            font-weight: 500;
            max-width: 580px;
        }

        .btn-main {
            display: inline-block;
            padding: 20px 40px;
            background: var(--dark);
            color: white;
            text-decoration: none;
            border-radius: 18px;
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.3);
        }

        .hero-image-wrap {
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.15);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* About Section */
        .about-section {
            padding: 120px 5%;
            position: relative;
            overflow: hidden;
            background: var(--white);
        }

        .about-container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 5;
        }

        .logo-jyaa-wrap {
            margin-bottom: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-jyaa-wrap img {
            height: 220px;
            /* BOLDER SCALE */
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 20px 50px rgba(255, 215, 0, 0.3));
        }

        .about-text h2 {
            font-family: var(--font-heading);
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 30px;
            letter-spacing: -1.5px;
        }

        .about-text p {
            font-size: 1.2rem;
            color: var(--slate);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        /* Timeline */
        .timeline-section {
            padding: 100px 5%;
            background-color: var(--light);
            position: relative;
            overflow: hidden;
        }

        .timeline-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #e2e8f0;
            transform: translateX(-50%);
        }

        .timeline-item {
            display: flex;
            justify-content: flex-end;
            padding-right: 50%;
            position: relative;
            margin-bottom: 80px;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-start;
            padding-right: 0;
            padding-left: 50%;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 20px;
            width: 24px;
            height: 24px;
            background: var(--white);
            border: 5px solid var(--primary);
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .timeline-content {
            background: var(--white);
            padding: 40px;
            border-radius: 32px;
            box-shadow: 0 15px 40px -10px rgba(0, 0, 0, 0.06);
            width: 85%;
            margin: 0 7.5%;
            transition: var(--transition);
        }

        .timeline-content .date {
            color: var(--primary);
            font-weight: 900;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .timeline-content h3 {
            font-family: var(--font-heading);
            font-size: 1.6rem;
            margin-bottom: 12px;
            font-weight: 800;
        }

        /* Registration Portal */
        .registration-section {
            padding: 120px 5% 180px;
            position: relative;
            overflow: hidden;
        }

        .portals-grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            position: relative;
            z-index: 5;
        }

        .portal-card {
            background: var(--white);
            border: 1px solid #f1f5f9;
            padding: 60px 40px;
            border-radius: 48px;
            text-align: center;
            transition: var(--transition);
            box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.03);
        }

        .portal-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 50px 100px -20px rgba(229, 62, 62, 0.1);
            border-color: var(--primary-light);
        }

        .portal-icon {
            width: 90px;
            height: 90px;
            background: var(--light);
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 40px;
            color: var(--primary);
        }

        .portal-card h3 {
            font-family: var(--font-heading);
            font-size: 2.2rem;
            font-weight: 900;
            margin-bottom: 15px;
        }

        .btn-portal {
            display: block;
            padding: 18px;
            border-radius: 18px;
            text-decoration: none;
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.1rem;
            transition: var(--transition);
            margin-top: 15px;
        }

        .btn-portal.primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 20px rgba(229, 62, 62, 0.2);
        }

        .btn-portal.secondary {
            background: var(--light);
            color: var(--dark);
        }

        /* Professional Footer */
        footer {
            background: #0a0f1d;
            color: #94a3b8;
            padding: 100px 5% 40px;
            position: relative;
            z-index: 10;
        }

        .footer-grid {
            max-width: 1200px;
            margin: 0 auto 80px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.2fr;
            gap: 80px;
        }

        .footer-brand h4 {
            color: white;
            font-family: var(--font-heading);
            font-size: 1.8rem;
            font-weight: 900;
            margin-bottom: 25px;
        }

        .footer-col h5 {
            color: white;
            font-family: var(--font-heading);
            font-weight: 800;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 2px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 18px;
        }

        .footer-links a {
            color: inherit;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--primary);
            padding-left: 8px;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }

        .credit-name {
            color: white;
            font-weight: 800;
        }

        @media (max-width: 1024px) {
            .hero-text h1 {
                font-size: 3.5rem;
            }

            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-btns {
                display: flex;
                justify-content: center;
            }

            .portals-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }

            .decoration-ondel {
                width: 180px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav id="navbar">
        <div class="nav-container">
            <a href="#" class="logo flex items-center overflow-hidden" style="height: 60px;">
                <img src="{{ asset('icon/logo_collab.png') }}" alt="JYAA Logo" style="width: 350px; height: auto; max-width: max-content; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.8));">
            </a>
            <ul class="nav-links">
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#timeline">Timeline</a></li>
                <li><a href="#registration" class="nav-cta">Daftar Sekarang</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Floating Stars (element2) Decoration -->
        <img src="{{ asset('icon/element2.png') }}" class="decoration-star" style="top: 15%; right: 10%; width: 100px;"
            alt="">
        <img src="{{ asset('icon/element2.png') }}" class="decoration-star"
            style="bottom: 20%; left: 5%; width: 70px; animation-delay: 1s;" alt="">

        <div class="hero-container">
            <div class="hero-text">
                <h1>Apresiasi Prestasi <span>Muda Jakarta.</span></h1>
                <p>Platform penganugerahan tertinggi bagi Ketua OSIS dan Organisasi Kepemudaan Inspiratif di lingkup DKI
                    Jakarta.</p>
                <div class="hero-btns">
                    <a href="#registration" class="btn-main">Mulai Registrasi</a>
                </div>
            </div>
            <div class="hero-image-wrap">
                <img src="{{ asset('icon/hero_jyaa.png') }}" style="width:100%;" alt="Jakarta Youth Hero">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <!-- Ondel-ondel (element1) Decoration LEFT -->
        <img src="{{ asset('icon/element1.png') }}" class="decoration-ondel"
            style="bottom: -20px; left: -40px; transform: rotate(10deg);" alt="">

        <div class="about-container">
            <div class="logo-jyaa-wrap">
                <img src="{{ asset('icon/logo jyaa.png') }}" alt="Logo JYAA 2026">
            </div>
            <div class="about-text">
                <h2>Jakarta Youth Achievement Award</h2>
                <p>Jakarta Youth Achievement Award (JYAA) merupakan ajang apresiasi bergengsi yang ditujukan bagi para
                    pemimpin muda di lingkungan OSIS SMA/SMK sederajat di DKI Jakarta.</p>
                <p>Kami merayakan inovasi, dedikasi, dan kontribusi nyata yang telah diberikan oleh para penggerak muda
                    untuk menciptakan ekosistem sekolah yang lebih baik dan berdampak positif bagi masyarakat luas.</p>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="timeline-section">
        <!-- Prominent Star Decoration -->
        <img src="{{ asset('icon/element2.png') }}" class="decoration-star" style="top: 50px; left: 10%; opacity: 0.3;"
            alt="">

        <div class="section-header" style="text-align:center; margin-bottom: 80px;">
            <p style="color: var(--primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px;">Agenda
                Kegiatan</p>
            <h2 style="font-family: var(--font-heading); font-size: 3.5rem; font-weight: 900;">Jadwal Pelaksanaan</h2>
        </div>

        <div class="timeline-container">
            <div class="timeline-line"></div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="date">1 April 2026</span>
                    <h3>Pembukaan Nominasi</h3>
                    <p>Pendaftaran resmi dibuka untuk seluruh kategori. Segera siapkan portofolio terbaik tim Anda.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="date">30 April 2026</span>
                    <h3>Penutupan Nominasi</h3>
                    <p>Batas akhir pengunggahan seluruh berkas digital. Sistem akan menutup pendaftaran pukul 23:59 WIB.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="date">1 – 8 Mei 2026</span>
                    <h3>Seleksi & Penjurian</h3>
                    <p>Proses kurasi berkas oleh dewan juri ahli untuk menentukan kandidat peraih penghargaan.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="date">22 Mei 2026</span>
                    <h3>Awarding Night</h3>
                    <p>Malam puncak penganugerahan dan perayaan pencapaian pemuda terbaik Jakarta.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="registration-section">
        <!-- Ondel-ondel (element1) Decoration RIGHT -->
        <img src="{{ asset('icon/element1.png') }}" class="decoration-ondel"
            style="bottom: -10px; right: -40px; transform: rotate(-10deg) scaleX(-1);" alt="">

        <div class="section-header" style="text-align:center; margin-bottom: 80px;">
            <p style="color: var(--primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px;">Terbuka
                Untuk Jalur</p>
            <h2 style="font-family: var(--font-heading); font-size: 3.5rem; font-weight: 900;">Pilih Kategori Anda</h2>
        </div>

        <div class="portals-grid">
            <div class="portal-card">
                <div class="portal-icon"><i data-feather="users" style="width: 45px; height: 45px;"></i></div>
                <h3>Organisasi</h3>
                <p>Delegasikan organisasi sekolah Anda untuk bergabung di Youth Generation Community.</p>
                <a href="{{ route('register') }}?role=organisasi" class="btn-portal primary">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="btn-portal secondary">Login Dashboard</a>
            </div>

            <div class="portal-card">
                <div class="portal-icon"><i data-feather="user" style="width: 45px; height: 45px;"></i></div>
                <h3>Ketua OSIS</h3>
                <p>Daftarkan portofolio kepemimpinan Anda sebagai individu penggerak sekolah.</p>
                <a href="{{ route('register') }}?role=ketos" class="btn-portal primary">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="btn-portal secondary">Login Dashboard</a>
            </div>
        </div>
    </section>

    <!-- Professional Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <h4>Jakarta Youth Award 2026</h4>
                <p>Memberikan pengakuan atas dedikasi dan kontribusi nyata para pemimpin muda Jakarta dalam membangun
                    masa depan yang lebih inovatif dan kolaboratif.</p>
                <div style="margin-top: 30px; display: flex; align-items: center; justify-content: flex-start; height: 80px; overflow: hidden; max-width: 500px;">
                    <img src="{{ asset('icon/logo_collab.png') }}"
                        style="width: 100%; height: auto; filter: drop-shadow(0 2px 5px rgba(0,0,0,0.8));"
                        alt="Collaborator">
                </div>
            </div>
            <div class="footer-col">
                <h5>Navigasi</h5>
                <ul class="footer-links">
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#timeline">Jadwal Agenda</a></li>
                    <li><a href="#registration">Pendaftaran</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Akses Portal</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('login') }}">Portal Ketua OSIS</a></li>
                    <li><a href="{{ route('login') }}">Portal Organisasi</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Hubungi Kami</h5>
                <p style="font-size: 0.9rem; margin-bottom: 10px;">Untuk pertanyaan lebih lanjut mengenai nominasi,
                    hubungi kami:</p>
                <a href="#" style="color: white; font-weight: 700; text-decoration: none;">info@jakartayouth.com</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Jakarta Youth Achievement Award. Seluruh Hak Cipta Dilindungi.</p>
            <p>Developed By <span class="credit-name">Gavino Pasha Putra</span></p>
        </div>
    </footer>

    <script>
        feather.replace();
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) nav.classList.add('scrolled');
            else nav.classList.remove('scrolled');
        });
    </script>
</body>

</html>