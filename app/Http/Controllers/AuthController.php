<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginSiswa()
    {
        return view('auth.login-siswa');
    }

    public function loginSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->where('kelas', $request->kelas)->first();

        if (!$siswa) {
            return back()->withErrors(['nis' => 'NIS atau Kelas tidak sesuai.'])->withInput();
        }

        Auth::guard('siswa')->login($siswa);

        return redirect()->route('siswa.dashboard');
    }

    public function showLoginAdmin()
    {
        return view('auth.login-admin');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect('/');
    }
}
