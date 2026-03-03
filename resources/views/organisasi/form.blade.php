<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Organisasi</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Pendaftaran Organisasi</h1>
        <p class="subtitle">Daftarkan organisasi sekolah Anda</p>
        
        <form action="{{ route('organisasi.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input 
                    type="text" 
                    id="nama_sekolah" 
                    name="nama_sekolah" 
                    value="{{ old('nama_sekolah') }}"
                    required
                >
                @error('nama_sekolah')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="nama_organisasi">Nama Organisasi</label>
                <input 
                    type="text" 
                    id="nama_organisasi" 
                    name="nama_organisasi" 
                    value="{{ old('nama_organisasi') }}"
                    required
                >
                @error('nama_organisasi')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email_organisasi">Email Organisasi</label>
                <input 
                    type="email" 
                    id="email_organisasi" 
                    name="email_organisasi" 
                    value="{{ old('email_organisasi') }}"
                    required
                >
                @error('email_organisasi')
                    <div class="error-message">{{ $message }}</div>
                @enderror
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
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea 
                    id="alamat" 
                    name="alamat" 
                    required
                >{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit">Daftar</button>
        </form>
        
        <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>
</html>
