<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Siswa Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            padding: 24px 18px;
            background: linear-gradient(180deg, #1e3a8a, #1e40af);
            color: white;
            overflow-y: auto;
        }
        .sidebar .brand {
            display: block;
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .sidebar .nav-link {
            display: block;
            color: rgba(255,255,255,0.9);
            margin-bottom: 10px;
            padding: 12px 16px;
            border-radius: 12px;
            text-decoration: none;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.14);
            color: white;
        }
        .main {
            margin-left: 240px;
            padding: 32px;
            min-height: 100vh;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }
        .card-modern {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            transition: 0.2s;
        }
        .card-modern:hover {
            transform: translateY(-4px);
        }
        .logout-btn {
            color: #f8f9fa;
            text-decoration: none;
            font-weight: 500;
        }
        .logout-btn:hover {
            text-decoration: underline;
        }
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        .bg-blue {
            background: linear-gradient(135deg, #2563eb, #1e40af);
        }
        .bg-indigo {
            background: linear-gradient(135deg, #3b82f6, #1e3a8a);
        }
        @media (max-width: 992px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="brand"><i class="bi bi-mortarboard-fill"></i> SISWA PANEL</div>

    <a href="{{ route('siswa.dashboard') }}" class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="{{ route('siswa.pengaduan.index') }}" class="nav-link {{ request()->routeIs('siswa.pengaduan.*') ? 'active' : '' }}">
        <i class="bi bi-exclamation-circle me-2"></i> Pengaduan
    </a>
    <a href="{{ route('siswa.aspirasi.index') }}" class="nav-link {{ request()->routeIs('siswa.aspirasi.*') ? 'active' : '' }}">
        <i class="bi bi-chat-left-text me-2"></i> Aspirasi
    </a>
    <a href="{{ route('logout') }}" class="nav-link text-danger">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
</div>
<div class="main">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
