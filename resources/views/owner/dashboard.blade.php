<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard()
    {
        // Burada veritabanı bağlandıktan sonra rezervasyonlar çekilecek.
        return view('owner.dashboard');
    }
}

