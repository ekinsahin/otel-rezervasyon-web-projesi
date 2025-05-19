<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    // Giriş ekranı POST isteğini karşılar
    public function login(Request $request)
    {
        // Geçici doğrulama (veritabanı yoksa bu şekilde)
        $sicil = $request->input('sicil');
        $sifre = $request->input('sifre');

        // Örnek: doğru bilgi girildiyse
        if ($sicil === '123456' && $sifre === 'password') {
            return redirect()->route('owner.dashboard');
        }

        return back()->withErrors(['Hatalı sicil numarası veya şifre']);
    }

    // Dashboard ekranı
    public function dashboard()
    {
        return view('owner.dashboard');
    }
}
