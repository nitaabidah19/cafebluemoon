<!DOCTYPE html>
{{-- File: resources/views/home.blade.php --}}
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueMoon Cafe — Menu</title>
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
            background: var(--navy);
            color: var(--white);
            min-height: 100vh;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            background:
                radial-gradient(ellipse at 70% 50%, rgba(201,168,76,0.08) 0%, transparent 60%),
                radial-gradient(ellipse at 20% 80%, rgba(184,212,232,0.06) 0%, transparent 50%),
                linear-gradient(160deg, #061428 0%, var(--navy) 50%, #0d2a4a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px 24px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '🌙';
            position: absolute;
            font-size: 300px;
            opacity: 0.03;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }

        .hero-badge {
            font-size: 11px;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--gold);
            border: 1px solid rgba(201,168,76,0.3);
            padding: 6px 18px;
            border-radius: 20px;
            margin-bottom: 24px;
            display: inline-block;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(52px, 10vw, 96px);
            font-weight: 700;
            line-height: 0.95;
            margin-bottom: 16px;
            background: linear-gradient(135deg, var(--white) 30%, var(--gold) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            font-size: 15px;
            color: var(--gray);
            max-width: 480px;
            line-height: 1.7;
            margin: 0 auto 36px;
        }

        .hero-cta {
            display: inline-block;
            padding: 14px 36px;
            background: linear-gradient(135deg, var(--gold), var(--gold-lt));
            color: var(--navy);
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.1em;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .hero-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(201,168,76,0.4);
        }

        /* MENU SECTION */
        .menu-section {
            padding: 80px 24px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .section-label {
            font-size: 10px;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
            text-align: center;
            margin-bottom: 8px;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 40px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 48px;
        }

        .section-title span { color: var(--gold); }

        /* CATEGORY PILLS */
        .cat-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 40px;
        }

        .cat-pill {
            padding: 8px 20px;
            border-radius: 24px;
            border: 1px solid rgba(184,212,232,0.2);
            font-size: 12px;
            cursor: pointer;
            color: var(--gray);
            background: transparent;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .cat-pill:hover,
        .cat-pill.active {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(201,168,76,0.08);
        }

        /* MENU CARDS */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: linear-gradient(135deg, rgba(26,58,92,0.5) 0%, rgba(11,31,58,0.8) 100%);
            border: 1px solid rgba(184,212,232,0.08);
            border-radius: 14px;
            overflow: hidden;
            transition: transform 0.2s, border-color 0.2s;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            border-color: rgba(201,168,76,0.25);
        }

        .card-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-no-img {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, rgba(26,58,92,0.8), rgba(11,31,58,0.9));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
        }

        .card-body {
            padding: 18px;
        }

        .card-cat {
            font-size: 10px;
            color: var(--gold);
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .card-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .card-desc {
            font-size: 12px;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 14px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-price {
            font-size: 18px;
            font-weight: 600;
            color: var(--gold);
            font-family: 'Cormorant Garamond', serif;
        }

        .badge-avail {
            font-size: 10px;
            padding: 3px 10px;
            border-radius: 20px;
            background: rgba(40,167,69,0.12);
            color: #6fcf97;
            border: 1px solid rgba(40,167,69,0.25);
        }

        .badge-habis {
            font-size: 10px;
            padding: 3px 10px;
            border-radius: 20px;
            background: rgba(220,53,69,0.12);
            color: #ff6b7a;
            border: 1px solid rgba(220,53,69,0.25);
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 32px;
            border-top: 1px solid rgba(184,212,232,0.08);
            color: var(--gray);
            font-size: 12px;
        }

        footer span { color: var(--gold); }

        /* NAVBAR */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 16px 36px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(11,31,58,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(201,168,76,0.1);
        }

        .nav-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--gold);
            text-decoration: none;
        }

        .nav-links { display:flex; gap:16px; align-items:center; }

        .nav-links a {
            color: var(--gray);
            text-decoration: none;
            font-size: 12px;
            transition: color 0.2s;
        }

        .nav-links a:hover { color: var(--gold); }

        .btn-login-nav {
            padding: 7px 18px;
            border: 1px solid rgba(201,168,76,0.4);
            color: var(--gold);
            border-radius: 6px;
            font-size: 12px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-login-nav:hover {
            background: rgba(201,168,76,0.1);
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav>
    <a href="{{ route('home') }}" class="nav-brand">🌙 BlueMoon</a>
    <div class="nav-links">
        <a href="#menu">Menu</a>
        @auth
            <a href="{{ route('dashboard') }}" class="btn-login-nav">Dashboard →</a>
        @else
            <a href="{{ route('login') }}" class="btn-login-nav">Login Admin</a>
        @endauth
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-badge">Samarinda · Since 2024</div>
    <h1 class="hero-title">Blue<br>Moon<br>Cafe</h1>
    <p class="hero-sub">Tempat di mana setiap tegukan adalah pengalaman. Kopi premium, suasana tenang, dan menu yang menyentuh hati.</p>
    <a href="#menu" class="hero-cta">Lihat Menu Kami ↓</a>
</section>

<!-- MENU -->
<section class="menu-section" id="menu">
    <div class="section-label">What We Offer</div>
    <h2 class="section-title">Menu <span>Pilihan</span></h2>

    @php
        $categories = \App\Models\Category::with(['menus' => function($q){
            $q->where('is_available', true);
        }])->get();
        $allMenus = \App\Models\Menu::with('category')->where('is_available', true)->get();
    @endphp

    <div class="cat-pills">
        <button class="cat-pill active" onclick="filterMenu('all', this)">✨ Semua</button>
        @foreach($categories as $cat)
            <button class="cat-pill" onclick="filterMenu('{{ $cat->id }}', this)">
                {{ $cat->icon }} {{ $cat->name }}
            </button>
        @endforeach
    </div>

    <div class="menu-grid" id="menuGrid">
        @forelse($allMenus as $menu)
        <div class="menu-card" data-cat="{{ $menu->category_id }}">
            @if($menu->image)
                <img src="{{ asset('uploads/'.$menu->image) }}"
                     alt="{{ $menu->name }}" class="card-img">
            @else
                <div class="card-no-img">{{ $menu->category->icon ?? '🍽️' }}</div>
            @endif
            <div class="card-body">
                <div class="card-cat">{{ $menu->category->name ?? '' }}</div>
                <div class="card-name">{{ $menu->name }}</div>
                <div class="card-desc">{{ $menu->description ?: 'Menu spesial BlueMoon Cafe.' }}</div>
                <div class="card-footer">
                    <div class="card-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                    <span class="badge-avail">Tersedia</span>
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1; text-align:center; color:var(--gray); padding:48px;">
            Belum ada menu tersedia.
        </div>
        @endforelse
    </div>
</section>

<footer>
    <p>© 2024 <span>BlueMoon Cafe</span> · Samarinda, Kalimantan Timur</p>
    <p style="margin-top:6px; opacity:0.5;">Dibuat dengan ☕ dan Laravel</p>
</footer>

<script>
function filterMenu(catId, btn) {
    document.querySelectorAll('.cat-pill').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('.menu-card').forEach(card => {
        if (catId === 'all' || card.dataset.cat === catId) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

</body>
</html>
