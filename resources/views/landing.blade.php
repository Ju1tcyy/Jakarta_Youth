<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Youth Achivement Award</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
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
            font-size: 1.5rem;
            font-weight: bold;
            color: #e53e3e;
        }
        
        nav .logo img {
            height: 100px;
            width: auto;
            margin-right: 20px;
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%);
            color: white;
            padding: 150px 5% 100px;
            text-align: center;
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
        }
        
        h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #333;
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
        }
        
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .about-card h3 {
            color: #e53e3e;
            margin-bottom: 1rem;
        }
        
        /* Timeline Section */
        .timeline {
            background: #f8f9fa;
            position: relative;
        }
        
        .timeline-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            padding-left: 50px;
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
            .hero h1 {
                font-size: 2rem;
            }
            
            nav ul {
                gap: 1rem;
            }
            
            h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('icon/logo collab.png') }}" alt="Youth Generation Logo" style="height: 100px; width: auto; margin-right: 20px;">
                Youth Generation
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#activities">Timeline</a></li>
                <li><a href="#registration">Registration</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <h1>Jakarta Youth Achivement Award</h1>
        <p>Empowering Student Voices, Shaping Future Leaders</p>
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
                <span class="timeline-status">Sedang Berlangsung</span>
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
