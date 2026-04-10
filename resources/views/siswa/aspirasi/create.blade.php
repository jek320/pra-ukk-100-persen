<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Aspirasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .container { max-width: 700px; margin-top: 60px; }
    </style>
</head>
<body>
<div class="container">
    <div class="card shadow-sm rounded-4">
        <div class="card-body p-5">
            <h3 class="mb-3">Buat Aspirasi</h3>
            <p class="text-muted mb-4">Sampaikan ide dan usulan agar sekolah semakin baik.</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('siswa.aspirasi.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Deskripsi Aspirasi</label>
                    <textarea name="isi" class="form-control" rows="6" placeholder="Tulis aspirasi Anda...">{{ old('isi') }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('siswa.aspirasi.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
