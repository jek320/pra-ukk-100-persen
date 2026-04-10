<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f5f9;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #1e3a8a, #1e40af);
            color: white;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 10px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .main {
            margin-left: 240px;
            padding: 30px;
        }

        .card-stat {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
        }

        .status-proses {
            background: #fff3cd;
            color: #856404;
        }

        .status-selesai {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-tolak {
            background: #f8d7da;
            color: #842029;
        }

        table {
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="px-4 mb-4 fw-bold fs-5">
        <i class="bi bi-shield-lock-fill"></i> ADMIN PANEL
    </div>

    <nav class="nav flex-column">
        <a href="#" class="nav-link active">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-exclamation-circle me-2"></i> Pengaduan
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-lightbulb me-2"></i> Aspirasi
        </a>
        <a href="#" class="nav-link text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </nav>
</div>

<div class="main">

    <h4 class="mb-4 fw-semibold">Dashboard Admin</h4>

    <!-- Statistik -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card card-stat p-3">
                <h6>Total Pengaduan</h6>
                <h3>25</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stat p-3">
                <h6>Total Aspirasi</h6>
                <h3>14</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stat p-3">
                <h6>Diproses</h6>
                <h3>10</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stat p-3">
                <h6>Selesai</h6>
                <h3>18</h3>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card p-4 shadow-sm">
        <h6 class="mb-3">Data Pengaduan & Aspirasi</h6>

        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Isi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ahmad</td>
                    <td>Pengaduan</td>
                    <td>AC kelas rusak</td>
                    <td><span class="badge-status status-proses">Diproses</span></td>
                    <td>
                        <button class="btn btn-sm btn-success">Selesai</button>
                        <button class="btn btn-sm btn-danger">Tolak</button>
                    </td>
                </tr>

                <tr>
                    <td>Siti</td>
                    <td>Aspirasi</td>
                    <td>Tambahkan wifi sekolah</td>
                    <td><span class="badge-status status-selesai">Selesai</span></td>
                    <td>
                        <button class="btn btn-sm btn-secondary">Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>