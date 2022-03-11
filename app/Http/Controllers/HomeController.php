<?php

namespace App\Http\Controllers;

use App\SuratKeluar;
use App\SuratMasuk;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all()->count();
        $suratMasuk = SuratMasuk::all()->count();
        $suratKeluar = SuratKeluar::all()->count();        

        return view('home', [
            'title' => "Dashboard",
            'subDashboard' => 'active',
            'user' => $user,
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
        ]);
    }
}
