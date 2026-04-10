<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasis = Aspirasi::where('siswa_id', session('siswa_id'))
            ->latest()
            ->get();

        return view('siswa.aspirasi.index', compact('aspirasis'));
    }

    public function create()
    {
        return view('siswa.aspirasi.create');
    }

    public function store(Request $request)
    {
        Aspirasi::create(array_merge(
            $request->validate(['isi' => 'required|string']),
            ['siswa_id' => session('siswa_id'), 'status' => 'diproses']
        ));

        return redirect()->route('siswa.aspirasi.index')->with('success', 'Aspirasi berhasil dikirim.');
    }
}
