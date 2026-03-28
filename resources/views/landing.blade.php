<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Generation Community</title>
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
            color: #667eea;
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
            color: #667eea;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #667eea;
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
            color: #667eea;
            margin-bottom: 1rem;
        }
        
        /* Activities Section */
        .activities {
            background: #f8f9fa;
        }
        
        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .activity-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .activity-card:hover {
            transform: translateY(-10px);
        }
        
        .activity-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }
        
        .activity-image-real {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }
        
        .activity-image-real img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .activity-content {
            padding: 1.5rem;
        }
        
        .activity-content h3 {
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .activity-date {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 1rem;
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
                <img src="{{ asset('icon/logo jyaa.png') }}" alt="Youth Generation Logo" style="height: 40px; margin-right: 10px;">
                Youth Generation
            </div>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#activities">Kegiatan</a></li>
                <li><a href="#registration">Daftar</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <h1>Youth Generation Community</h1>
        <p>Memberdayakan dan mendukung pemuda dalam berbagai aspek kehidupan untuk mencapai potensi penuh mereka</p>
    </section>

    <!-- About Section -->
    <section id="about">
        <h2>Tentang Kami</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem;">
            Youth Generation Community adalah sebuah komunitas yang bertujuan untuk memberdayakan dan mendukung pemuda 
            dalam berbagai aspek kehidupan mereka. Kami memberikan kesempatan untuk berinteraksi, belajar, dan tumbuh bersama.
        </p>
        
        <div class="about-content">
            <div class="about-card">
                <h3>📚 Pembelajaran</h3>
                <p>Memperluas pengetahuan dan mengembangkan keterampilan baru melalui berbagai kegiatan dan pelatihan</p>
            </div>
            <div class="about-card">
                <h3>👥 Kepemimpinan</h3>
                <p>Kesempatan mengambil peran kepemimpinan dan mengasah keterampilan yang berharga</p>
            </div>
            <div class="about-card">
                <h3>💪 Pemberdayaan Diri</h3>
                <p>Meningkatkan kepercayaan diri dan kesiapan menghadapi tantangan kehidupan</p>
            </div>
            <div class="about-card">
                <h3>🤝 Kolaborasi</h3>
                <p>Bekerja sama dalam proyek bersama dan membangun jaringan yang mendukung perkembangan</p>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section id="activities" class="activities">
        <h2>Kegiatan Kami</h2>
        
        <div class="activities-grid">
            <div class="activity-card">
                <div class="activity-image">🎯</div>
                <div class="activity-content">
                    <h3>Leadership Camp</h3>
                    <p class="activity-date">15-17 Juni 2024</p>
                    <p>Program pengembangan kepemimpinan untuk pemuda yang ingin mengasah kemampuan memimpin dan berorganisasi</p>
                </div>
            </div>
            
            <div class="activity-card">
                <div class="activity-image">🌟</div>
                <div class="activity-content">
                    <h3>Character Building</h3>
                    <p class="activity-date">20-22 Juli 2024</p>
                    <p>Workshop pembentukan karakter dengan fokus pada nilai-nilai moral dan pengembangan kepribadian</p>
                </div>
            </div>
            
            <div class="activity-card">
                <div class="activity-image">🚀</div>
                <div class="activity-content">
                    <h3>Youth Summit</h3>
                    <p class="activity-date">10-12 Agustus 2024</p>
                    <p>Pertemuan pemuda untuk berdiskusi tentang isu-isu terkini dan mencari solusi bersama</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="registration">
        <h2>Daftar Sekarang</h2>
        
        <div class="activities-grid">
            <div class="activity-card">
                <div class="activity-image-real">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&h=600&fit=crop" alt="Organisasi">
                </div>
                <div class="activity-content">
                    <h3>Organisasi</h3>
                    <p class="activity-date">Pendaftaran Organisasi</p>
                    <p>Daftarkan organisasi sekolah Anda untuk bergabung dengan Youth Generation Community</p>
                    <a href="{{ route('organisasi.create') }}" class="coming-soon-btn">Daftar</a>
                </div>
            </div>
            
            <div class="activity-card">
                <div class="activity-image-real">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop" alt="Ketos">
                </div>
                <div class="activity-content">
                    <h3>Ketos</h3>
                    <p class="activity-date">Pendaftaran Ketua OSIS</p>
                    <p>Daftarkan diri sebagai Ketua OSIS untuk menjadi bagian dari jaringan pemimpin muda</p>
                    <a href="{{ route('ketos.create') }}" class="coming-soon-btn">Daftar</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Youth Generation Community. All rights reserved.</p>
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
