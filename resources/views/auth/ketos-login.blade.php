<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Ketos - Jakarta Youth Achievement Award 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            height: 120px;
            width: auto;
            margin-bottom: 20px;
        }

        .logo h1 {
            color: #667eea;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .logo p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .back-link {
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
            }
            
            .logo img {
                height: 80px;
                margin-bottom: 15px;
            }
            
            .logo h1 {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .logo img {
                height: 70px;
            }
            
            .logo h1 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('icon/logo_fix.png') }}" alt="Jakarta Youth Achivement Award  Logo">
            <h1>Portal Ketos</h1>
            <p>Jakarta Youth Achievement Award 2026</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('ketos.login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Ketos</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-btn">
                Masuk ke Portal Ketos
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
