<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', sans-serif;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            transition: all 0.25s ease;
        }

        .card:hover {
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            padding: 20px 24px;
        }

        .card-header h4 {
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #dee2e6;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 0.15rem rgba(44, 62, 80, 0.15);
        }

        .btn-primary {
            background-color: #2c3e50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1f2d3a;
        }

        .btn-secondary {
            border-radius: 8px;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 576px) {
            .button-group {
                flex-direction: column;
                gap: 10px;
            }

            .button-group a,
            .button-group button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="card">

        <div class="card-header">
            <h4>Edit Kategori</h4>
        </div>

        <div class="card-body">

            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text"
                           name="nama_kategori"
                           value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                           class="form-control"
                           placeholder="Masukkan nama kategori">
                </div>

                <div class="d-flex justify-content-between button-group">
                    <a href="{{ route('kategori.index') }}" 
                       class="btn btn-secondary px-4">
                        Kembali
                    </a>

                    <button type="submit" 
                            class="btn btn-primary px-4">
                        Update Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>