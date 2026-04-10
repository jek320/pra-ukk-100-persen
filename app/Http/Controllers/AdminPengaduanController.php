<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with(['siswa', 'kategori'])
            ->latest()
            ->get();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:diproses,selesai,ditolak',
        ]);

        $pengaduan->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pengaduan berhasil diperbarui.');
    }
}
