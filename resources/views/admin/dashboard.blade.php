@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-bold">Dashboard Admin</h3>
        <p class="text-muted">Ringkasan cepat pengaduan, aspirasi, dan kategori.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card card-stat p-4 bg-white">
                <h6 class="text-uppercase text-secondary">Total Kategori</h6>
                <h2 class="mt-3">{{ $totalKategori }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-4 bg-white">
                <h6 class="text-uppercase text-secondary">Total Pengaduan</h6>
                <h2 class="mt-3">{{ $totalPengaduan }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-4 bg-white">
                <h6 class="text-uppercase text-secondary">Total Aspirasi</h6>
                <h2 class="mt-3">{{ $totalAspirasi }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-4 bg-white">
                <h6 class="text-uppercase text-secondary">Diproses</h6>
                <h2 class="mt-3">{{ $diproses }}</h2>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('kategori.index') }}" class="btn btn-primary me-2">Kelola Kategori</a>
        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-outline-primary me-2">Lihat Pengaduan</a>
        <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-outline-primary">Lihat Aspirasi</a>
    </div>

    <div class="card table-card bg-white p-4">
        <h5 class="mb-3">Ringkasan</h5>
        <div class="row gy-3">
            <div class="col-md-6">
                <div class="p-4 border rounded-4">
                    <h6>Status Diproses</h6>
                    <strong>{{ $diproses }}</strong>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 border rounded-4">
                    <h6>Status Selesai</h6>
                    <strong>{{ $selesai }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
