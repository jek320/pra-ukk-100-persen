<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPengaduan = Pengaduan::count();
        $totalAspirasi = Aspirasi::count();
        $totalKategori = Kategori::count();
        $diproses = Pengaduan::where('status', 'diproses')->count()
            + Aspirasi::where('status', 'diproses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count()
            + Aspirasi::where('status', 'selesai')->count();

        return view('admin.dashboard', compact(
            'totalPengaduan',
            'totalAspirasi',
            'totalKategori',
            'diproses',
            'selesai'
        ));
    }
}