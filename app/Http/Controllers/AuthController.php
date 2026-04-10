<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request, string $type)
    {
        $rules = ['password' => 'required|string'];

        if ($type === 'admin') {
            $request->validate(array_merge(['username' => 'required|string'], $rules));
            $user = Admin::where('username', $request->username)->first();
            $session = ['admin_id' => $user?->id, 'admin_username' => $user?->username];
            $route = 'admin.dashboard';
            $error = 'Login gagal. Username atau password salah.';
        } else {
            $request->validate(array_merge(['nisn' => 'required|string'], $rules));
            $user = Siswa::where('nisn', $request->nisn)->first();
            $session = ['siswa_id' => $user?->id, 'siswa_nama' => $user?->nama];
            $route = 'siswa.dashboard';
            $error = 'Login gagal. NISN atau password salah.';
        }

        if ($user && Hash::check($request->password, $user->password)) {
            session($session);
            return redirect()->route($route);
        }

        return back()->with('error', $error);
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('home');
    }
}