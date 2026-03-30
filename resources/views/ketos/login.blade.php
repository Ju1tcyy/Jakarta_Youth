<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Ketos - Youth Generation</title>
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
            max-width: 400px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo img {
            height: 120px;
            width: auto;
            margin-bottom: 20px;
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
        
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input:focus {
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
        
        .links {
            text-align: center;
            margin-top: 20px;
        }
        
        .links a {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
        }
        
        .links a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 30px 25px;
                max-width: 100%;
            }
            
            .logo img {
                height: 80px;
                margin-bottom: 15px;
            }
            
            h1 {
                font-size: 1.5rem;
                margin-bottom: 8px;
            }
            
            .subtitle {
                font-size: 14px;
                margin-bottom: 25px;
            }
            
            input {
                padding: 12px;
                font-size: 16px; /* Prevents zoom on iOS */
            }
            
            button {
                padding: 14px;
                font-size: 16px;
            }
            
            .links {
                margin-top: 15px;
            }
            
            .links a {
                font-size: 14px;
                display: inline-block;
                margin: 5px 8px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .container {
                padding: 25px 20px;
            }
            
            .logo img {
                height: 70px;
            }
            
            h1 {
                font-size: 1.3rem;
            }
            
            .subtitle {
                font-size: 13px;
            }
            
            .form-group {
                margin-bottom: 18px;
            }
            
            label {
                font-size: 14px;
            }
            
            input {
                padding: 11px;
                font-size: 16px;
            }
            
            button {
                padding: 13px;
                font-size: 15px;
            }
            
            .links a {
                font-size: 13px;
                margin: 3px 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('icon/logo collab.png') }}" alt="Youth Generation Logo">
        </div>
        
        <h1>Login Ketos</h1>
        <p class="subtitle">Akses dashboard ketua OSIS</p>
        
        <form action="{{ route('ketos.login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
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
                    required
                >
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <div class="links">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
            <a href="{{ route('ketos.create') }}">Belum daftar?</a>
        </div>
    </div>
</body>
</html>