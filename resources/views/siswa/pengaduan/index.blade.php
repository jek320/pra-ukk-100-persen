<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaduan Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .container { max-width: 1000px; margin-top: 40px; }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3>Pengaduan Saya</h3>
            <p class="text-muted">Lihat status pengaduan yang telah dikirim.</p>
        </div>
        <a href="{{ route('siswa.pengaduan.create') }}" class="btn btn-primary">Buat Pengaduan Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="table-responsive p-4">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengaduan->kategori?->nama_kategori ?? 'Tidak ada kategori' }}</td>
                            <td>{{ $pengaduan->isi }}</td>
                            <td>
                                <span class="badge bg-{{ $pengaduan->status === 'selesai' ? 'success' : ($pengaduan->status === 'ditolak' ? 'danger' : 'warning') }} text-dark">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </td>
                            <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada pengaduan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
