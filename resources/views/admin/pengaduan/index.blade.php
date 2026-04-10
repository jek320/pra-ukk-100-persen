@extends('layouts.admin')

@section('title', 'Daftar Pengaduan')

@section('content')
    <div class="topbar">
        <div>
            <h3>Daftar Pengaduan</h3>
            <p class="text-muted">Kelola semua laporan pengaduan siswa.</p>
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
                        <th>Kategori</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengaduan->siswa->nama }}</td>
                            <td>{{ $pengaduan->siswa->nisn }}</td>
                            <td>{{ $pengaduan->kategori?->nama_kategori ?? 'Tidak ada kategori' }}</td>
                            <td>{{ Illuminate\Support\Str::limit($pengaduan->isi, 80) }}</td>
                            <td>
                                <span class="badge bg-{{ $pengaduan->status === 'selesai' ? 'success' : ($pengaduan->status === 'ditolak' ? 'danger' : 'warning') }} text-dark">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </td>
                            <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    @if($pengaduan->status !== 'selesai')
                                        <form action="{{ route('admin.pengaduan.status', $pengaduan) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="selesai">
                                            <button class="btn btn-sm btn-success">Selesai</button>
                                        </form>
                                    @endif

                                    @if($pengaduan->status !== 'ditolak')
                                        <form action="{{ route('admin.pengaduan.status', $pengaduan) }}" method="POST">
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
                            <td colspan="8" class="text-center py-5 text-muted">Belum ada pengaduan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
