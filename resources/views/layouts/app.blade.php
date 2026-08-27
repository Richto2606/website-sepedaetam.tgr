<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sepedaetam.tgr · Sewa Sepeda Modern')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        body { background: #f8fafc; }
        .shadow-soft { box-shadow: 0 8px 24px -6px rgba(0, 0, 0, 0.04), 0 2px 4px -2px rgba(0, 0, 0, 0.02); }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.25s; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.06); }
        .badge-pill { border-radius: 9999px; padding: 0.2rem 0.9rem; font-weight: 500; font-size: 0.7rem; letter-spacing: 0.01em; }
        .bg-soft-gray { background: #f1f5f9; }
        .border-soft { border-color: #e9edf2; }
        .text-muted { color: #64748b; }
        .btn-wa { background: #25D366; transition: background 0.15s; }
        .btn-wa:hover { background: #1da851; }
        .btn-outline-dark { border: 1px solid #e2e8f0; transition: all 0.15s; }
        .btn-outline-dark:hover { background: #f1f5f9; border-color: #cbd5e1; }
        .hero-bg { background: linear-gradient(145deg, #ffffff 0%, #fafcfd 100%); }
        .map-container { border-radius: 1rem; overflow: hidden; border: 1px solid #e9edf2; }
    </style>
</head>
<body class="antialiased text-[#1e293b]">

@yield('content')

<footer class="text-[0.6rem] text-muted mt-3">© 2026 Sepedaetam.tgr — clean white, Gen Z vibes</footer>

</body>
</html>