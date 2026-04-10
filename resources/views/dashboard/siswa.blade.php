<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, #1e3a8a, #1e40af);
            color: white;
            padding-top: 20px;
            position: fixed;
            width: 240px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 10px;
            margin: 4px 10px;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.15);
            color: white;
        }

        .sidebar .brand {
            font-weight: 700;
            font-size: 18px;
            padding: 0 20px 20px;
        }

        .top-navbar {
            margin-left: 240px;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 15px 30px;
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

        .card-modern {
            border: none;
            border-radius: 18px;
            transition: 0.3s;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: white;
        }

        .bg-blue {
            background: linear-gradient(135deg, #2563eb, #1e40af);
        }

        .bg-indigo {
            background: linear-gradient(135deg, #3b82f6, #1e3a8a);
        }

        .logout-btn {
            color: #dc3545;
            text-decoration: none;
            font-weight: 500;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }

        @media (max-width: 992px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .top-navbar,
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="brand">
        <i class="bi bi-mortarboard-fill"></i> SISWA PANEL
    </div>

    <nav class="nav flex-column">
        <a class="nav-link active" href="{{ route('siswa.dashboard') }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a class="nav-link" href="{{ route('siswa.pengaduan.index') }}">
            <i class="bi bi-exclamation-circle me-2"></i> Pengaduan
        </a>
        <a class="nav-link" href="{{ route('siswa.aspirasi.index') }}">
            <i class="bi bi-chat-left-text me-2"></i> Aspirasi
        </a>
    </nav>
</div>

<!-- Top Navbar -->
<div class="top-navbar d-flex justify-content-between align-items-center">
    <h5 class="mb-0 fw-semibold">Dashboard Siswa</h5>

    <div>
        <span class="me-3 text-muted">
            <i class="bi bi-person-circle"></i> Halo, {{ $siswa?->nama ?? 'Siswa' }}
        </span>
        <a href="{{ route('logout') }}" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card card-modern p-4 text-center">
                <div class="card-icon bg-blue">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <h5 class="fw-semibold">Buat Pengaduan</h5>
                <p class="text-muted">Sampaikan keluhan terkait fasilitas atau layanan sekolah.</p>
                <a href="{{ route('siswa.pengaduan.create') }}" class="btn btn-primary rounded-pill px-4">
                    Buat Sekarang
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-modern p-4 text-center">
                <div class="card-icon bg-indigo">
                    <i class="bi bi-lightbulb-fill"></i>
                </div>
                <h5 class="fw-semibold">Buat Aspirasi</h5>
                <p class="text-muted">Sampaikan saran dan ide untuk kemajuan sekolah.</p>
                <a href="{{ route('siswa.aspirasi.create') }}" class="btn btn-primary rounded-pill px-4">
                    Kirim Aspirasi
                </a>
            </div>
        </div>
    </div>

</div>

</body>
</html>
