<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Youth Achievement Award</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
        }
        
        /* Navbar */
        nav {
            background: rgba(255, 255, 255, 0.95);
            padding: 0.5rem 5%;
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
        }
        
        nav .logo img {
            height: 60px;
            width: auto;
            margin-right: 15px;
            display: block;
            max-width: none;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: #e53e3e;
        }
        
        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 5px;
        }
        
        .mobile-menu-btn span {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 3px 0;
            transition: 0.3s;
        }
        
        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .mobile-menu.active {
            display: block;
        }
        
        .mobile-menu ul {
            flex-direction: column;
            padding: 1rem 0;
            gap: 0;
        }
        
        .mobile-menu ul li {
            text-align: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .mobile-menu ul li:last-child {
            border-bottom: none;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            color: white;
            padding: 120px 5% 100px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            width: 120px;
            height: 120px;
            background: url('{{ asset('icon/element1.png') }}') no-repeat center;
            background-size: contain;
            opacity: 0.3;
            z-index: 1;
        }
        
        .hero::after {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 120px;
            height: 120px;
            background: url('{{ asset('icon/element2.png') }}') no-repeat center;
            background-size: contain;
            opacity: 0.3;
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: white;
            color: #e53e3e;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: transform 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-3px);
        }
        
        /* Section Styles */
        section {
            padding: 80px 5%;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }
        
        section::before {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: url('{{ asset('icon/element1.png') }}') no-repeat center;
            background-size: contain;
            opacity: 0.05;
            z-index: 0;
        }
        
        h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #333;
            position: relative;
            z-index: 1;
        }
        
        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .about-card {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .about-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            background: url('{{ asset('icon/element2.png') }}') no-repeat center;
            background-size: contain;
            opacity: 0.08;
            z-index: 0;
        }
        
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .about-card h3 {
            color: #e53e3e;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }
        
        /* Timeline Section */
        .timeline {
            background: #f8f9fa;
            position: relative;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            top: 50px;
            left: 50px;
            width: 100px;
            height: 100px;
            background: url('{{ asset('icon/element2.png') }}') no-repeat center;
            background-size: contain;
            opacity: 0.03;
            z-index: 0;
        }
        
        .timeline-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            padding-left: 50px;
            z-index: 1;
        }
        
        .timeline-container::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #e53e3e;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 40px;
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-left: 20px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -35px;
            top: 25px;
            width: 16px;
            height: 16px;
            background: #e53e3e;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 0 0 4px #e53e3e;
        }
        
        .timeline-item h3 {
            color: #333;
            font-size: 1.4rem;
            margin-bottom: 8px;
        }
        
        .timeline-date {
            color: #666;
            font-size: 1rem;
            margin-bottom: 15px;
            font-weight: 500;
        }
        
        .timeline-description {
            color: #555;
            line-height: 1.6;
        }
        
        .timeline-status {
            display: inline-block;
            background: #e53e3e;
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 10px;
        }
        
        .coming-soon-btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 1rem;
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
        }
        
        .coming-soon-btn:hover {
            background: #667eea;
            color: white;
        }
        
        /* Registration Section */
        .registration {
            background: white;
        }
        
        .registration-container {
            display: flex;
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
            justify-content: center;
        }
        
        .registration-card {
            flex: 1;
            max-width: 450px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            position: relative;
        }
        
        .registration-card::after {
            content: '';
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            background: url('{{ asset('icon/element1.png') }}') no-repeat center;
            background-size: contain;
            opacity: 0.1;
            z-index: 1;
        }
        
        .registration-card:hover {
            transform: translateY(-10px);
        }
        
        .registration-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }
        
        .registration-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .registration-content {
            padding: 2rem;
            position: relative;
            z-index: 2;
        }
        
        .registration-content h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .registration-subtitle {
            color: #e53e3e;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        
        .registration-content p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .registration-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .registration-btn {
            display: block;
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            border: 2px solid #e53e3e;
        }
        
        .registration-btn.primary {
            background: #e53e3e;
            color: white;
        }
        
        .registration-btn.primary:hover {
            background: #c53030;
            border-color: #c53030;
        }
        
        .registration-btn.secondary {
            background: white;
            color: #e53e3e;
        }
        
        .registration-btn.secondary:hover {
            background: #e53e3e;
            color: white;
        }
        
        @media (max-width: 768px) {
            .registration-container {
                flex-direction: column;
                gap: 1.5rem;
            }
        }
        
        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem 5%;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            /* Navigation */
            nav {
                padding: 0.5rem 3%;
            }
            
            nav ul {
                display: none;
            }
            
            .mobile-menu-btn {
                display: flex;
            }
            
            nav .container {
                justify-content: space-between;
            }
            
            nav .logo {
                font-size: 1rem;
            }
            
            nav .logo img {
                height: 40px;
                margin-right: 10px;
            }
            
            /* Hero Section */
            .hero {
                padding: 100px 3% 60px;
            }
            
            .hero h1 {
                font-size: 2rem;
                margin-bottom: 0.8rem;
            }
            
            .hero p {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }
            
            .hero::before,
            .hero::after {
                width: 60px;
                height: 60px;
                top: 10px;
            }
            
            .hero::before {
                left: 10px;
            }
            
            .hero::after {
                right: 10px;
            }
            
            /* Sections */
            section {
                padding: 50px 3%;
            }
            
            h2 {
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
            }
            
            /* About Section */
            .about-content {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin-top: 2rem;
            }
            
            .about-card {
                padding: 1.5rem;
            }
            
            /* Timeline */
            .timeline-container {
                padding-left: 30px;
            }
            
            .timeline-container::before {
                left: 15px;
            }
            
            .timeline-item {
                margin-left: 15px;
                padding: 20px 20px;
                margin-bottom: 30px;
            }
            
            .timeline-item::before {
                left: -30px;
                width: 12px;
                height: 12px;
                top: 20px;
            }
            
            .timeline-item h3 {
                font-size: 1.2rem;
            }
            
            .timeline-date {
                font-size: 0.9rem;
            }
            
            .timeline-description {
                font-size: 0.9rem;
            }
            
            /* Registration */
            .registration-container {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .registration-card {
                max-width: 100%;
            }
            
            .registration-image {
                height: 200px;
            }
            
            .registration-content {
                padding: 1.5rem;
            }
            
            .registration-content h3 {
                font-size: 1.3rem;
            }
            
            .registration-btn {
                padding: 10px;
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            /* Navigation */
            nav {
                padding: 0.5rem 2%;
            }
            
            nav .logo {
                font-size: 0.9rem;
            }
            
            nav .logo img {
                height: 35px;
                margin-right: 8px;
            }
            
            nav ul {
                gap: 0.8rem;
            }
            
            nav ul li a {
                font-size: 13px;
            }
            
            /* Hero */
            .hero {
                padding: 90px 2% 50px;
            }
            
            .hero h1 {
                font-size: 1.6rem;
                line-height: 1.2;
            }
            
            .hero p {
                font-size: 0.9rem;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
            
            /* Sections */
            section {
                padding: 40px 2%;
            }
            
            h2 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }
            
            /* About */
            .about-card {
                padding: 1.2rem;
            }
            
            .about-card h3 {
                font-size: 1.1rem;
            }
            
            /* Timeline */
            .timeline-container {
                padding-left: 25px;
            }
            
            .timeline-container::before {
                left: 12px;
                width: 3px;
            }
            
            .timeline-item {
                margin-left: 12px;
                padding: 15px;
                margin-bottom: 25px;
            }
            
            .timeline-item::before {
                left: -27px;
                width: 10px;
                height: 10px;
                top: 15px;
            }
            
            .timeline-item h3 {
                font-size: 1.1rem;
                margin-bottom: 6px;
            }
            
            .timeline-date {
                font-size: 0.8rem;
                margin-bottom: 10px;
            }
            
            .timeline-description {
                font-size: 0.85rem;
                line-height: 1.5;
            }
            
            .timeline-status {
                font-size: 0.8rem;
                padding: 4px 10px;
            }
            
            /* Registration */
            .registration-image {
                height: 180px;
            }
            
            .registration-content {
                padding: 1.2rem;
            }
            
            .registration-content h3 {
                font-size: 1.2rem;
            }
            
            .registration-subtitle {
                font-size: 0.9rem;
            }
            
            .registration-content p {
                font-size: 0.9rem;
                margin-bottom: 1.2rem;
            }
            
            .registration-btn {
                padding: 9px;
                font-size: 13px;
            }
            
            /* Footer */
            footer {
                padding: 1.5rem 2%;
                font-size: 0.9rem;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 320px) {
            .hero h1 {
                font-size: 1.4rem;
            }
            
            .hero p {
                font-size: 0.85rem;
            }
            
            nav .logo {
                font-size: 0.8rem;
            }
            
            nav .logo img {
                height: 30px;
            }
            
            h2 {
                font-size: 1.3rem;
            }
            
            .timeline-item h3 {
                font-size: 1rem;
            }
            
            .registration-content h3 {
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
                <img src="{{ asset('icon/logo collab.png') }}" alt="Youth Generation Logo" style="height: 60px; width: auto; margin-right: 15px;">
                Youth Generation
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#activities">Timeline</a></li>
                <li><a href="#registration">Registration</a></li>
            </ul>
            <div class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <ul>
                <li><a href="#home" onclick="closeMobileMenu()">Home</a></li>
                <li><a href="#about" onclick="closeMobileMenu()">About Us</a></li>
                <li><a href="#activities" onclick="closeMobileMenu()">Timeline</a></li>
                <li><a href="#registration" onclick="closeMobileMenu()">Registration</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Jakarta Youth Achievement Award</h1>
            <p>Empowering Student Voices, Shaping Future Leaders</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <h2>About Us</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem;">
            Jakarta Youth Achievement Award (JYAA) merupakan ajang apresiasi dan kompetisi yang ditujukan bagi OSIS SMA/sederajat di DKI Jakarta untuk mengakui kinerja, inovasi, dan kontribusi nyata dalam lingkungan sekolah maupun masyarakat. Melalui JYAA, kami berkomitmen untuk mendorong lahirnya generasi pemimpin muda yang inspiratif, kolaboratif, dan berdampak. Tidak hanya sebagai kompetisi, JYAA juga menjadi wadah pengembangan diri, pertukaran ide, serta peningkatan kapasitas kepemimpinan bagi para pengurus OSIS di Jakarta.</p>
            
        </div>
    </section>

    <!-- Activities Section -->
    <section id="activities" class="timeline">
        <h2>Timeline Jakarta Youth Achievement Award 2026</h2>
        
        <div class="timeline-container">
            <div class="timeline-item">
                <h3>Pembukaan Nominasi</h3>
                <div class="timeline-date">1 April 2026</div>
                <div class="timeline-description">
                    Periode pendaftaran dan pengumpulan berkas nominasi untuk semua kategori Jakarta Youth Achievement Award 2026 dimulai
                </div>
            </div>
            
            <div class="timeline-item">
                <h3>Penutupan Nominasi</h3>
                <div class="timeline-date">30 April 2026</div>
                <div class="timeline-description">
                    Batas akhir pengumpulan berkas nominasi untuk semua kategori. Pastikan semua dokumen telah diunggah sebelum deadline
                </div>
            </div>
            
            <div class="timeline-item">
                <h3>Proses Penilaian & Seleksi Nominasi</h3>
                <div class="timeline-date">1 – 8 Mei 2026</div>
                <div class="timeline-description">
                    Tim juri melakukan evaluasi menyeluruh terhadap semua nominasi yang masuk untuk menentukan finalis terbaik
                </div>
            </div>
            
            <div class="timeline-item">
                <h3>Pengumuman & Launch 5 OSIS Terbaik per Nominasi</h3>
                <div class="timeline-date">10 Mei 2026</div>
                <div class="timeline-description">
                    Pengumuman dan launch 5 OSIS terbaik per nominasi yang berhasil masuk ke babak final
                </div>
            </div>
            
            <div class="timeline-item">
                <h3>Puncak Acara & Awarding Night Jakarta Youth Achievement Award 2026</h3>
                <div class="timeline-date">22 Mei 2026</div>
                <div class="timeline-description">
                    Malam puncak Jakarta Youth Achievement Award 2026 dengan pengumuman pemenang dan pemberian penghargaan
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="registration">
        <h2>Daftar Sekarang</h2>
        
        <div class="registration-container">
            <div class="registration-card">
                <div class="registration-image">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&h=600&fit=crop" alt="Organisasi">
                </div>
                <div class="registration-content">
                    <h3>Organisasi</h3>
                    <p class="registration-subtitle">Pendaftaran Organisasi</p>
                    <p>Daftarkan organisasi sekolah Anda untuk bergabung dengan Youth Generation Community</p>
                    <div class="registration-buttons">
                        <a href="{{ route('organisasi.create') }}" class="registration-btn primary">Daftar</a>
                        <a href="{{ route('organisasi.login') }}" class="registration-btn secondary">Login Dashboard</a>
                    </div>
                </div>
            </div>
            
            <div class="registration-card">
                <div class="registration-image">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop" alt="Ketos">
                </div>
                <div class="registration-content">
                    <h3>Ketos</h3>
                    <p class="registration-subtitle">Pendaftaran Ketua OSIS</p>
                    <p>Daftarkan diri sebagai Ketua OSIS untuk menjadi bagian dari jaringan pemimpin muda</p>
                    <div class="registration-buttons">
                        <a href="{{ route('ketos.create') }}" class="registration-btn primary">Daftar</a>
                        <a href="{{ route('ketos.login') }}" class="registration-btn secondary">Login Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; Created By Gavino Pasha Putra.</p>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
        }
        
        function closeMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.remove('active');
        }
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            
            if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                mobileMenu.classList.remove('active');
            }
        });
        
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
