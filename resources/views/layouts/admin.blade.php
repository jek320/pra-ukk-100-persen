<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f6fb;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            padding: 28px 20px;
            background: linear-gradient(180deg, #1e3a8a, #2563eb);
            color: white;
            overflow-y: auto;
        }
        .sidebar .brand {
            display: block;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 32px;
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
            background: rgba(255,255,255,0.16);
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
            margin-bottom: 24px;
        }
        .topbar h3 {
            margin: 0;
        }
        .card-stat,
        .table-card {
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(15,23,42,0.08);
            border: none;
        }
        .table-card {
            overflow: hidden;
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
    <div class="brand"><i class="bi bi-shield-lock-fill"></i> ADMIN PANEL</div>

    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
        <i class="bi bi-list-ul me-2"></i> Kategori
    </a>
    <a href="{{ route('admin.pengaduan.index') }}" class="nav-link {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
        <i class="bi bi-exclamation-circle me-2"></i> Pengaduan
    </a>
    <a href="{{ route('admin.aspirasi.index') }}" class="nav-link {{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}">
        <i class="bi bi-lightbulb me-2"></i> Aspirasi
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
