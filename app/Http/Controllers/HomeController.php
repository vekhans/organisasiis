<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\models\Anggota;
use App\Models\models\Desa;
use App\Models\models\Cabang;
use App\Models\models\AnggotaCabang;

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

        $jumlah_anggota = Anggota::count();
        $jumlah_cabang = Cabang::count();
        $cabang = Cabang::all();
        $anggotacabangs = AnggotaCabang::all();


 $categories= [];
 $series= [];

        foreach ($cabang as $cabangs) {
            $categories [] = $cabangs->nama; 
             $series [] = $cabangs->cabanganggotacabang->count('id_anggota');
        } 

        return view('home',['jumlah_anggota'=>$jumlah_anggota, 'jumlah_cabang'=>$jumlah_cabang, 'cabangs'=>$cabangs,  'categories'=>$categories, 'series'=>$series,]);

    }
}
