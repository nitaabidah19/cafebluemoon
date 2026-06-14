<!DOCTYPE html>
{{-- File: resources/views/auth/login.blade.php --}}
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — BlueMoon Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy:  #0B1F3A;
            --blue:  #1A3A5C;
            --sky:   #B8D4E8;
            --gold:  #C9A84C;
            --gold-lt:#E8C97A;
            --white: #F5F8FC;
            --gray:  #8BA3BB;
        }

        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background decoration */
        body::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(201,168,76,0.06) 0%, transparent 70%);
            top: -100px; right: -100px;
            border-radius: 50%;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(184,212,232,0.05) 0%, transparent 70%);
            bottom: -80px; left: -80px;
            border-radius: 50%;
        }

        .login-wrap {
            display: flex;
            width: 800px;
            min-height: 480px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(201,168,76,0.2);
            box-shadow: 0 32px 80px rgba(0,0,0,0.5);
            position: relative;
            z-index: 1;
        }

        /* Left panel */
        .login-left {
            flex: 1;
            background: linear-gradient(160deg, #1A3A5C 0%, #0B1F3A 60%, #061428 100%);
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '🌙';
            position: absolute;
            font-size: 180px;
            bottom: -20px;
            right: -20px;
            opacity: 0.05;
        }

        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 700;
            color: var(--gold);
            line-height: 1;
        }

        .brand-tagline {
            font-size: 12px;
            color: var(--gray);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-top: 6px;
        }

        .left-quote {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            font-style: italic;
            color: rgba(184,212,232,0.6);
            line-height: 1.6;
        }

        .gold-line {
            height: 1px;
            width: 60px;
            background: var(--gold);
            margin: 16px 0;
            opacity: 0.5;
        }

        /* Right panel (form) */
        .login-right {
            width: 340px;
            background: rgba(11,31,58,0.95);
            padding: 48px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 6px;
        }

        .form-subtitle {
            font-size: 12px;
            color: var(--gray);
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 10px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 6px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 11px 14px;
            background: rgba(26,58,92,0.4);
            border: 1px solid rgba(184,212,232,0.15);
            border-radius: 8px;
            color: var(--white);
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus { border-color: var(--gold); }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .remember-row input[type="checkbox"] {
            width: auto;
            accent-color: var(--gold);
        }

        .remember-row label {
            font-size: 11px;
            color: var(--gray);
            margin: 0;
            text-transform: none;
            letter-spacing: 0;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 100%);
            border: none;
            border-radius: 8px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.08em;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(201,168,76,0.4);
        }

        .error-msg {
            background: rgba(220,53,69,0.12);
            border: 1px solid rgba(220,53,69,0.25);
            color: #ff6b7a;
            border-radius: 7px;
            padding: 10px 14px;
            font-size: 12px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

<div class="login-wrap">
    <!-- Kiri -->
    <div class="login-left">
        <div>
            <div class="brand-name">🌙 BlueMoon</div>
            <div class="brand-tagline">Cafe & Resto</div>
        </div>
        <div>
            <div class="left-quote">"Setiap tegukan kopi adalah undangan untuk melambat, menghirup momen, dan merasakan keindahan dalam kesederhanaan."</div>
            <div class="gold-line"></div>
            <div style="font-size:11px; color:var(--gray);">Sistem Manajemen Cafe</div>
        </div>
    </div>

    <!-- Kanan (Form) -->
    <div class="login-right">
        <div class="form-title">Masuk</div>
        <div class="form-subtitle">Silakan login untuk melanjutkan</div>

        @if($errors->any())
            <div class="error-msg">⚠️ {{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="admin@bluemoon.com" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="remember-row">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn-login">MASUK →</button>
        </form>
    </div>
</div>

</body>
</html>
