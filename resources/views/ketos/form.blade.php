<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Ketos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Pendaftaran Ketos</h1>
        <p class="subtitle">Daftarkan diri sebagai Ketua OSIS</p>
        
        <form action="{{ route('ketos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
                @error('nama')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input 
                    type="text" 
                    id="asal_sekolah" 
                    name="asal_sekolah" 
                    value="{{ old('asal_sekolah') }}"
                    placeholder="Contoh: SMA Negeri 1 Jakarta"
                    required
                >
                @error('asal_sekolah')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    required
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Minimal 8 karakter"
                    required
                >
                <small style="color: #666; font-size: 12px;">Password ini akan digunakan untuk login ke dashboard ketos</small>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input 
                        type="text" 
                        id="tempat_lahir" 
                        name="tempat_lahir" 
                        value="{{ old('tempat_lahir') }}"
                        placeholder="Contoh: Jakarta"
                        required
                    >
                    @error('tempat_lahir')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input 
                        type="date" 
                        id="tanggal_lahir" 
                        name="tanggal_lahir" 
                        value="{{ old('tanggal_lahir') }}"
                        required
                    >
                    @error('tanggal_lahir')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="nomor_wa">Nomor WhatsApp</label>
                <input 
                    type="text" 
                    id="nomor_wa" 
                    name="nomor_wa" 
                    value="{{ old('nomor_wa') }}"
                    placeholder="08xxxxxxxxxx"
                    required
                >
                @error('nomor_wa')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit">Daftar</button>
        </form>
        
        <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>
</html>
