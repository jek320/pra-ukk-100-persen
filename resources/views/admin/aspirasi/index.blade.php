@extends('layouts.admin')

@section('title', 'Daftar Aspirasi')

@section('content')
    <div class="topbar">
        <div>
            <h3>Daftar Aspirasi</h3>
            <p class="text-muted">Kelola semua aspirasi siswa.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="table-responsive p-4">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aspirasis as $aspirasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $aspirasi->siswa->nama }}</td>
                            <td>{{ $aspirasi->siswa->nisn }}</td>
                            <td>{{ Illuminate\Support\Str::limit($aspirasi->isi, 80) }}</td>
                            <td>
                                <span class="badge bg-{{ $aspirasi->status === 'selesai' ? 'success' : ($aspirasi->status === 'ditolak' ? 'danger' : 'warning') }} text-dark">
                                    {{ ucfirst($aspirasi->status) }}
                                </span>
                            </td>
                            <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    @if($aspirasi->status !== 'selesai')
                                        <form action="{{ route('admin.aspirasi.status', $aspirasi) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="selesai">
                                            <button class="btn btn-sm btn-success">Selesai</button>
                                        </form>
                                    @endif

                                    @if($aspirasi->status !== 'ditolak')
                                        <form action="{{ route('admin.aspirasi.status', $aspirasi) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="ditolak">
                                            <button class="btn btn-sm btn-danger">Tolak</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">Belum ada aspirasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
