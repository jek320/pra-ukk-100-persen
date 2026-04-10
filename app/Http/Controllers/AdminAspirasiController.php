<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AdminAspirasiController extends Controller
{
    public function index()
    {
        $aspirasis = Aspirasi::with('siswa')
            ->latest()
            ->get();

        return view('admin.aspirasi.index', compact('aspirasis'));
    }

    public function updateStatus(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:diproses,selesai,ditolak',
        ]);

        $aspirasi->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }
}
