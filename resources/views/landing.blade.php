<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIAP - Sistem Aspirasi & Pengaduan Siswa</title>
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
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: white;
        }

        /* Navbar */
        .navbar-custom {
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.08);
        }

        /* Hero */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .btn-main {
            padding: 10px 28px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-light-custom {
            background: white;
            color: #1e3a8a;
        }

        .btn-light-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255,255,255,0.3);
        }

        .btn-outline-custom {
            border: 1px solid rgba(255,255,255,0.6);
            color: white;
        }

        .btn-outline-custom:hover {
            background: rgba(255,255,255,0.15);
            transform: translateY(-3px);
        }

        /* Feature Cards */
        .feature-card {
            background: white;
            color: #1e293b;
            border-radius: 20px;
            padding: 30px;
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .feature-icon {
            font-size: 35px;
            color: #2563eb;
        }

        /* CTA */
        .cta-section {
            background: white;
            color: #1e293b;
            border-radius: 25px;
            padding: 50px;
            margin-top: 80px;
        }

        footer {
            background: rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            SIAP
        </a>
    </div>
</nav>

<!-- HERO -->
<div class="container hero-section pt-5">
    <div class="row w-100 align-items-center">

        <div class="col-md-6 text-center text-md-start">
            <h1 class="fw-bold display-5">
                Sistem Aspirasi & Pengaduan Siswa
            </h1>
            <p class="mt-3 opacity-75">
                Platform resmi sekolah untuk menyampaikan aspirasi, masukan,
                dan laporan fasilitas secara cepat, aman, dan transparan.
            </p>

            <div class="mt-4">
                <a href="{{ route('login.siswa') }}" class="btn btn-main btn-light-custom me-2">
                    <i class="bi bi-person-circle"></i> Login Siswa
                </a>

                <a href="{{ route('login.admin') }}" class="btn btn-main btn-outline-custom">
                    <i class="bi bi-shield-lock"></i> Login Admin
                </a>
            </div>
        </div>

        <div class="col-md-6 text-center mt-5 mt-md-0">
            <i class="bi bi-megaphone-fill" style="font-size: 140px; opacity: 0.85;"></i>
        </div>

    </div>
</div>

<!-- FITUR -->
<div class="container mt-5 pb-5">
    <div class="row text-center g-4">

        <div class="col-md-4">
            <div class="feature-card shadow">
                <div class="feature-icon mb-3">
                    <i class="bi bi-send-fill"></i>
                </div>
                <h5>Kirim Aspirasi</h5>
                <p class="text-muted">
                    Siswa dapat menyampaikan ide dan masukan untuk kemajuan sekolah.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-card shadow">
                <div class="feature-icon mb-3">
                    <i class="bi bi-exclamation-circle-fill"></i>
                </div>
                <h5>Lapor Kerusakan</h5>
                <p class="text-muted">
                    Laporkan fasilitas sekolah yang rusak secara cepat dan mudah.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-card shadow">
                <div class="feature-icon mb-3">
                    <i class="bi bi-clipboard-data-fill"></i>
                </div>
                <h5>Monitoring Admin</h5>
                <p class="text-muted">
                    Admin memantau dan menindaklanjuti laporan dengan transparan.
                </p>
            </div>
        </div>

    </div>

    <!-- CTA -->
    <div class="cta-section text-center mt-5 shadow">
        <h3 class="fw-bold">Bersama Membangun Sekolah Lebih Baik</h3>
        <p class="mt-2 text-muted">
            Aspirasi siswa adalah langkah awal perubahan.
        </p>
        <a href="{{ route('login.siswa') }}" class="btn btn-primary btn-main mt-3">
            Mulai Sekarang
        </a>
    </div>

</div>

<!-- FOOTER -->
<footer class="text-center py-4 mt-5">
    <small>
        © {{ date('Y') }} SIAP - Sistem Aspirasi & Pengaduan Siswa
    </small>
</footer>

</body>
</html>