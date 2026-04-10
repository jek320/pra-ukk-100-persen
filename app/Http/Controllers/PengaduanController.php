<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::where('siswa_id', session('siswa_id'))
            ->with('kategori')
            ->latest()
            ->get();

        return view('siswa.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        $categories = Kategori::all();

        return view('siswa.pengaduan.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Pengaduan::create(array_merge(
            $request->validate([
                'kategori_id' => 'required|exists:kategori,id',
                'isi' => 'required|string',
            ]),
            ['siswa_id' => session('siswa_id'), 'status' => 'diproses']
        ));

        return redirect()->route('siswa.pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }
}
