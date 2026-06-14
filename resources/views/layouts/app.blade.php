<!DOCTYPE html>
{{-- File: resources/views/layouts/app.blade.php --}}
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueMoon Cafe — @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy:    #0B1F3A;
            --blue:    #1A3A5C;
            --sky:     #B8D4E8;
            --gold:    #C9A84C;
            --gold-lt: #E8C97A;
            --white:   #F5F8FC;
            --gray:    #8BA3BB;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--navy);
            color: var(--white);
            min-height: 100vh;
            display: flex;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: linear-gradient(180deg, #061428 0%, var(--navy) 100%);
            border-right: 1px solid rgba(201,168,76,0.15);
            padding: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0; top: 0; bottom: 0;
        }

        .sidebar-logo {
            padding: 32px 24px 24px;
            border-bottom: 1px solid rgba(201,168,76,0.12);
        }

        .logo-moon {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--gold);
            letter-spacing: 0.04em;
            line-height: 1;
        }

        .logo-sub {
            font-size: 10px;
            color: var(--gray);
            letter-spacing: 0.25em;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .sidebar-nav {
            padding: 20px 0;
            flex: 1;
        }

        .nav-label {
            font-size: 9px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gray);
            padding: 12px 24px 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 24px;
            color: #7A99B8;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--gold);
            background: rgba(201,168,76,0.06);
            border-left-color: var(--gold);
        }

        .nav-icon { font-size: 16px; }

        .sidebar-user {
            padding: 20px 24px;
            border-top: 1px solid rgba(201,168,76,0.12);
        }

        .user-name {
            font-size: 12px;
            font-weight: 600;
            color: var(--white);
        }

        .user-role {
            font-size: 10px;
            color: var(--gray);
            margin-bottom: 10px;
        }

        .btn-logout {
            display: block;
            width: 100%;
            padding: 8px;
            background: rgba(201,168,76,0.1);
            border: 1px solid rgba(201,168,76,0.3);
            color: var(--gold);
            border-radius: 6px;
            font-size: 11px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            letter-spacing: 0.05em;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background: rgba(201,168,76,0.2);
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            margin-left: 240px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            padding: 20px 36px;
            background: rgba(11,31,58,0.95);
            border-bottom: 1px solid rgba(184,212,232,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--white);
        }

        .page-title span {
            color: var(--gold);
        }

        .content {
            padding: 32px 36px;
            flex: 1;
        }

        /* ===== CARDS ===== */
        .card {
            background: linear-gradient(135deg, rgba(26,58,92,0.5) 0%, rgba(11,31,58,0.8) 100%);
            border: 1px solid rgba(184,212,232,0.1);
            border-radius: 12px;
            padding: 24px;
            backdrop-filter: blur(4px);
        }

        .card-gold {
            border-color: rgba(201,168,76,0.3);
        }

        /* ===== STAT CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(26,58,92,0.6) 0%, rgba(11,31,58,0.9) 100%);
            border: 1px solid rgba(184,212,232,0.1);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .stat-icon {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--gold);
            line-height: 1;
        }

        .stat-label {
            font-size: 11px;
            color: var(--gray);
            margin-top: 4px;
            letter-spacing: 0.05em;
        }

        /* ===== TABLES ===== */
        .table-wrap {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid rgba(184,212,232,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: rgba(26,58,92,0.8);
            padding: 12px 16px;
            text-align: left;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 600;
        }

        tbody tr {
            border-top: 1px solid rgba(184,212,232,0.06);
            transition: background 0.15s;
        }

        tbody tr:hover {
            background: rgba(184,212,232,0.04);
        }

        tbody td {
            padding: 12px 16px;
            font-size: 13px;
            color: #C5D8EC;
            vertical-align: middle;
        }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.04em;
            cursor: pointer;
            border: none;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 100%);
            color: var(--navy);
        }

        .btn-gold:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(201,168,76,0.35);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid rgba(184,212,232,0.3);
            color: var(--sky);
        }

        .btn-outline:hover {
            border-color: var(--sky);
            background: rgba(184,212,232,0.08);
        }

        .btn-danger {
            background: rgba(220,53,69,0.15);
            border: 1px solid rgba(220,53,69,0.3);
            color: #ff6b7a;
        }

        .btn-danger:hover {
            background: rgba(220,53,69,0.25);
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 11px;
        }

        /* ===== FORMS ===== */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 6px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px 14px;
            background: rgba(11,31,58,0.6);
            border: 1px solid rgba(184,212,232,0.15);
            border-radius: 8px;
            color: var(--white);
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--gold);
        }

        select option {
            background: var(--navy);
        }

        textarea { resize: vertical; min-height: 80px; }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        /* ===== ALERTS ===== */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-success {
            background: rgba(40,167,69,0.15);
            border: 1px solid rgba(40,167,69,0.3);
            color: #6fcf97;
        }

        .alert-error {
            background: rgba(220,53,69,0.15);
            border: 1px solid rgba(220,53,69,0.3);
            color: #ff6b7a;
        }

        /* ===== BADGE ===== */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .badge-pending  { background: rgba(255,193,7,0.15);  color: #ffc107; border: 1px solid rgba(255,193,7,0.3); }
        .badge-process  { background: rgba(13,110,253,0.15); color: #69a9ff; border: 1px solid rgba(13,110,253,0.3); }
        .badge-done     { background: rgba(40,167,69,0.15);  color: #6fcf97; border: 1px solid rgba(40,167,69,0.3); }
        .badge-cancelled{ background: rgba(220,53,69,0.15);  color: #ff6b7a; border: 1px solid rgba(220,53,69,0.3); }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-header h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            color: var(--white);
        }

        .page-header h2 span { color: var(--gold); }

        /* ===== IMAGE PREVIEW ===== */
        .menu-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(201,168,76,0.2);
        }

        .no-img {
            width: 48px;
            height: 48px;
            background: rgba(26,58,92,0.5);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .divider-gold {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 24px 0;
            opacity: 0.3;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-moon">🌙 BlueMoon</div>
        <div class="logo-sub">Cafe & Resto</div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Main</div>
        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="nav-icon">🏠</span> Dashboard
        </a>

        <div class="nav-label">Kelola</div>
        <a href="{{ route('category.index') }}"
           class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}">
            <span class="nav-icon">🏷️</span> Kategori
        </a>
        <a href="{{ route('menu.index') }}"
           class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}">
            <span class="nav-icon">🍽️</span> Menu
        </a>
        <a href="{{ route('order.index') }}"
           class="nav-link {{ request()->routeIs('order.*') ? 'active' : '' }}">
            <span class="nav-icon">📋</span> Pesanan
        </a>

        <div class="nav-label">Lainnya</div>
        <a href="{{ route('home') }}" target="_blank" class="nav-link">
            <span class="nav-icon">🌐</span> Lihat Menu Publik
        </a>
    </nav>

    <div class="sidebar-user">
        <div class="user-name">{{ Auth::user()->name }}</div>
        <div class="user-role">Administrator</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Keluar →</button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <div class="page-title">{!! $__env->yieldContent('page-title', 'Dashboard') !!}</div>
        <div style="font-size:11px; color:var(--gray);">
            {{ now()->isoFormat('dddd, D MMMM Y') }}
        </div>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">
                ⚠️
                @foreach($errors->all() as $e){{ $e }} @endforeach
            </div>
        @endif

        @yield('content')
    </div>
</div>

</body>
</html>
