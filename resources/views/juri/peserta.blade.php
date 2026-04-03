<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Peserta - {{ $organisasi->nama_organisasi }} - {{ config('app.name', 'Jakarta Youth Achievement Award') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root { --primary: #4f46e5; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; min-height: 100vh; }
        .header {
            background: #0f172a;
            padding: 0 32px;
            height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky; top: 0; z-index: 50;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }
        .header-left { display: flex; align-items: center; gap: 16px; }
        .back-link {
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            display: flex; align-items: center; gap: 6px;
            font-size: 0.8rem; font-weight: 600;
            transition: color 0.2s;
        }
        .back-link:hover { color: #fff; }
        .header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem; font-weight: 700;
            background: linear-gradient(120deg,#818cf8,#c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .badge-juri {
            background: rgba(99,102,241,0.2);
            border: 1px solid rgba(99,102,241,0.4);
            color: #a5b4fc;
            border-radius: 50px;
            padding: 4px 12px;
            font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px;
        }
        .container { max-width: 900px; margin: 0 auto; padding: 36px 24px; }
        .profile-card {
            background: #fff;
            border-radius: 20px;
            padding: 24px 28px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .avatar {
            width: 52px; height: 52px;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-family: 'Outfit',sans-serif;
            font-size: 1.5rem; font-weight: 900;
            flex-shrink: 0;
        }
        .profile-name { font-family: 'Outfit',sans-serif; font-size: 1.1rem; font-weight: 800; color: #0f172a; }
        .profile-school { font-size: 0.8rem; color: #64748b; margin-top: 2px; }
    </style>
</head>
<body>
<div class="header">
    <div class="header-left">
        <a href="{{ route('juri.dashboard') }}" class="back-link">
            <i data-feather="arrow-left" style="width:14px;height:14px;"></i> Kembali
        </a>
        <h1>Form Penilaian</h1>
    </div>
    <span class="badge-juri">Juri: {{ auth()->user()->name }}</span>
</div>

<div class="container">
    <div class="profile-card">
        <div class="avatar">{{ substr($organisasi->nama_organisasi, 0, 1) }}</div>
        <div>
            <div class="profile-name">{{ $organisasi->nama_organisasi }}</div>
            <div class="profile-school">{{ $organisasi->nama_sekolah }} &mdash; {{ $organisasi->user->email }}</div>
        </div>
    </div>

    @include('juri._scoring_form', [
        'formAction' => route('juri.store', $organisasi->id),
        'backUrl'    => route('juri.dashboard'),
    ])
</div>

<script>
feather.replace({ 'width': 18, 'height': 18 });
@if(session('success'))
    Swal.fire({ icon:'success', title:'Tersimpan!', text:'{{ session("success") }}', confirmButtonColor:'#4f46e5', timer:3000 });
@endif
</script>
</body>
</html>
