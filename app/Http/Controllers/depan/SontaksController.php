<?php

namespace App\Http\Controllers\depan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\models\Arsip;
use App\Models\models\JenisBerita;
use App\Models\models\JenisArsip;
use App\Models\models\Berita;
use App\Models\models\MediaBerita;
use App\Models\models\Liat;
use App\Models\models\Kontak;
use App\Models\models\Pidio;
use App\Models\models\Profil;
class SontaksController extends Controller
{
    public function index(Request $req, $id=null, $ket=null, $ket2=null)
    {
        $title = 'Kontak '; 
        $kontak = Kontak::all();
        $jakObj =Profil::all(); 
         $propil =Profil::all(); 
        return view('muka.kontak',['title'=>$title, 'propil'=>$propil, 'kontak'=>$kontak, 'jakObj'=>$jakObj]);
    }
    public function saves (Request $req, $id = null)
    {
        try
        {
            $title        = 'Kirim Pesan / Komentar ';
            $this->validate($req, [
                'nama'     => 'required|max:100',
                'email'    => 'required|max:100',
                'komentar'     => 'required',
            ]);  
            $vheput = Kontak::find($id);
            $vheput = new Kontak;
            $vheput->nama = $req->nama;
            $vheput->email     = $req->email;
            $vheput->perihal   = $req->perihal;
            $vheput->komentar   = $req->komentar; 
            $vheput->url = \Request::url();
            $vheput->session_id = \Request::getSession()->getId();
            $vheput->id_user = (\Auth::check())?\Auth::id():null;
            $vheput->ip = \Request::getClientIp();
            $vheput->agent = \Request::header('User-Agent');
            $vheput->save();
            return redirect()->route('pesans')->with('status','Pesan / Komentar Telah dikirim!');
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    public function propil()
    {
        $title = 'Veranda'; 
        $propil =Profil::all(); 

        return view('layouts.temp.ednes',['title'=>$title, 'propil'=>$propil]);
    }
}
