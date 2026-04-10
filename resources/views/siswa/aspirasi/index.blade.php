<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aspirasi Saya</title>
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
            <h3>Aspirasi Saya</h3>
            <p class="text-muted">Lihat status aspirasi yang telah dikirim.</p>
        </div>
        <a href="{{ route('siswa.aspirasi.create') }}" class="btn btn-primary">Buat Aspirasi Baru</a>
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
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aspirasis as $aspirasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $aspirasi->isi }}</td>
                            <td>
                                <span class="badge bg-{{ $aspirasi->status === 'selesai' ? 'success' : ($aspirasi->status === 'ditolak' ? 'danger' : 'warning') }} text-dark">
                                    {{ ucfirst($aspirasi->status) }}
                                </span>
                            </td>
                            <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada aspirasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
