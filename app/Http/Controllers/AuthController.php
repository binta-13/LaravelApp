<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    // Metode untuk menampilkan formulir login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Metode untuk melakukan proses login
    public function login(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cobakan untuk melakukan otentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, alihkan ke halaman yang sesuai
            return redirect()->intended('/'); // Ganti '/dashboard' sesuai dengan rute yang sesuai
        }

        // Jika gagal, kembali ke halaman login dengan pesan kesalahan
        return redirect()->route('login')->with('error', 'Email atau password salah.');
    }

    // Metode untuk menampilkan formulir registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Metode untuk melakukan proses registrasi
    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User(); // Buat instance model User
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Enkripsi password sebelum disimpan
        $user->save();

        // Setelah berhasil registrasi, alihkan ke halaman yang sesuai
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Melakukan logout pengguna
    $request->session()->invalidate(); // Menghapus sesi pengguna
    $request->session()->regenerateToken(); // Me-regenerate token sesi

    return redirect('/'); // Alihkan ke halaman utama atau halaman lain yang sesuai
}
}
