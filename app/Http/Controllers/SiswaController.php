<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $siswa = Siswa::find(session('siswa_id'));

        return view('siswa.dashboard', compact('siswa'));
    }
}