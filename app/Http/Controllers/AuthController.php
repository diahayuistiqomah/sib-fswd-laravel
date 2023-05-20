<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('layout.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/users');
        } else {
            // Login gagal
            $error_message = 'Email atau password salah';
            return view('layout.login', compact('error_message'));
        }
    }
    
}
