<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth as FirebaseAuth;

class AuthController 
{
    protected $firebaseAuth;

    public function __construct()
    {
        $this->firebaseAuth = (new Factory)
            ->withServiceAccount(base_path('firebase-credentials.json'))
            ->createAuth();
    }

    // Kayıt işlemi
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone'    => 'nullable|string|max:20',
            'firebase_uid' => 'required|string'
        ]);

        try {
            // Laravel veritabanında kullanıcı oluştur
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'phone'    => $request->phone,
                'firebase_uid' => $request->firebase_uid,
            ]);

            auth()->login($user);

            return redirect()->route('dashboard')->with('success', 'Kayıt işlemi başarıyla tamamlandı!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Kayıt işlemi başarısız: ' . $e->getMessage(),
            ]);
        }
    }

    // Giriş işlemi
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Firebase ile giriş yap
            $signInResult = $this->firebaseAuth->signInWithEmailAndPassword(
                $credentials['email'],
                $credentials['password']
            );

            // Laravel'de kullanıcıyı bul ve giriş yap
            $user = User::where('email', $credentials['email'])->first();
            
            if ($user) {
                auth()->login($user);
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }

            return back()->withErrors([
                'email' => 'Kullanıcı bulunamadı!',
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Giriş başarısız: ' . $e->getMessage(),
            ]);
        }
    }

    // Oturum kapatma
    public function logout(Request $request)
    {
        try {
            // Firebase oturumunu kapat
            if (auth()->user() && auth()->user()->firebase_uid) {
                $this->firebaseAuth->revokeRefreshTokens(auth()->user()->firebase_uid);
            }
        } catch (\Exception $e) {
            // Firebase oturum kapatma hatası olsa bile devam et
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
