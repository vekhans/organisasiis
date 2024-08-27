<?php

namespace App\Http\Controllers\depan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\models\Kontak;
use App\Models\models\Slide;
use App\Models\models\Profil;
use App\Models\models\JenisBerita;
use App\Models\models\JenisArsip;
use App\Models\models\Berita;
use App\Models\models\MediaBerita;
use App\Models\models\MediaProfil;
use App\Models\models\KomentarBerita;
use App\Models\models\Komentarall;
use App\Models\models\Pidio;
use App\Models\models\Anggota;
use App\Models\models\Desa;
use App\Models\models\Cabang;
use App\Models\models\Kecamatan;
use App\Models\models\Provinsi;
use App\Models\models\AnggotaCabang;
 
 use Image;

class MukaController extends Controller
{
    public function index(Request $req, $id = null, $ket=null, $ket2=null)
    {
        $title        = 'Beranda ';
        $slideObj     = Slide::all();
        $propil =Profil::all(); 
        $nonaObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
            $query->where('jenis','=','foto');
        }])->OrderBy('brubah','desc')->limit(1)->get();
        $pidio =Pidio::OrderBy('updated_at','desc')->paginate(4);
        $sidio =Pidio::OrderBy('updated_at','desc')->limit(2)->get();
        $beritaObj    = Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
            $query->where('jenis','=','foto');
        }])->OrderBy('brubah','desc')->offset(1, $nonaObj )->paginate(3);
        $sacObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
            $query->where('jenis','=','foto');
        }])->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
        $jenisBeritaObj = JenisBerita::all();
        return view('muka.beranda',['title'=>$title, 'slideObj'=>$slideObj, 'nonaObj'=>$nonaObj, 'jenisBeritaObj'=>$jenisBeritaObj, 'beritaObj'=>$beritaObj,  'sacObj'=>$sacObj, 'sidio'=>$sidio, 'propil'=>$propil,'pidio'=>$pidio]);  
    }
    public function berall($ket=null,$ket2=null)
    {
        $title     = 'Berita ';
        $beritaObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
            $query->where('jenis','=','foto');
        }])->orderBy('brubah','desc');
        $propil =Profil::all();
        $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto'); }])->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
        if($ket2) {
            $ket2 = explode("-", $ket2);
            $ket2 = array_shift($ket2);
        }
        $id_jenis  = null;
        if($ket == 'kategori' && $ket2 != null) {
            $id_jenis = $ket2;
            $beritaObj->where('ok','=',1)->where('id_jenis','=',$ket2);
        }
        $jenisBeritaObj = JenisBerita::all();
        $jenisArsipObj = JenisArsip::all();
        $siIga =Pidio::OrderBy('updated_at','desc')->limit(1)->get();
        return view('muka.berall',['title'=>$title, 'propil'=>$propil, 'putryObj'=>$putryObj, 'jenisBeritaObj'=>$jenisBeritaObj, 'jenisArsipObj'=>$jenisArsipObj,  'id_jenis'=>$id_jenis, 'siIga'=>$siIga,'beritaObj'=>$beritaObj->paginate(5)]);
    }
    public function pidio()
    {
        try{
            $title     = 'Video ';
            $pidioObj = Pidio::where('ok','=',1)->orderBy('updated_at','desc')->paginate(4);
            $propil =Profil::all();
            $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto'); }])->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
            $jenisBeritaObj = JenisBerita::all();
            return view('muka.pidio',['title'=>$title, 'propil'=>$propil,'putryObj'=>$putryObj, 'jenisBeritaObj'=>$jenisBeritaObj, 'pidioObj'=>$pidioObj]);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    public function deber($id=null,$slug=null)
    {
        try{
        if($id && $slug) {
            $berita = Berita::where('ok','=',1)->find($id);
            if($berita->exists()) {
                $berita->increment('visit_count');
                // \App\models\Liat::createViewLog($berita);
                $jenisBeritaObj = JenisBerita::all(); 
                $propil =Profil::all();
                $sberitaObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto');
                }])->orderBy('brubah','desc')->offset(1,$berita)->limit(2)->get();
                $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                    $query->where('jenis','=','foto');
                }])->OrderBy('rating','desc')->limit(4)->get();
                $jenisBeritaObjR = JenisBerita::all();                
                $berupdateObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto');
                }])->OrderBy('brubah','desc')->offset(1, $berita )->paginate(3);
                $title = ucwords($berita->judul);
                $siIga =Pidio::OrderBy('updated_at','desc')->limit(2)->get();
                $marvein =Pidio::OrderBy('updated_at','desc')->offset(2)->limit(2)->get();
                return view('muka.detail_berita',['title'=>$title, 'berita'=>$berita, 'jenisBeritaObj'=>$jenisBeritaObj,'sberitaObj'=>$sberitaObj, 'propil'=>$propil,'jenisBeritaObjR'=>$jenisBeritaObjR, 'berupdateObj'=>$berupdateObj, 'putryObj'=>$putryObj, 'siIga'=>$siIga, 'marvein'=>$marvein]);
            }
            else {
                return redirect()->route('berall');                
            }
        }
        else {
                return redirect()->route('berall');                
            }
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    } 
    public function profil(Request $req, $id, $ket=null, $ket2=null)
    {
        $title = 'Profil ';
        $beritaObj = Berita::all(); 
        $putryObj =Berita::with(['media_berita' => function ($query) {
            $query->where('jenis','=','foto');}])
        ->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
        $jakObj =Profil::all();
        $propil =Profil::all();
        $vein =Pidio::OrderBy('updated_at','desc')->limit(2)->get();
        $jenisBeritaObj = JenisBerita::all();
        return view('muka.profil',['title'=>$title, 'propil'=>$propil, 'jenisBeritaObj'=>$jenisBeritaObj, 'beritaObj'=>$beritaObj, 'putryObj'=>$putryObj, 'jakObj'=>$jakObj, 'vein'=>$vein]);
    }
    public function komentarBerita(Request $req,$id,$id_komentar=null)
    {
        $berita = Berita::find($id);
        if($berita->exists()) 
        {
            $komentar = new KomentarBerita;
            $komentar->id_berita   = $id;
            $komentar->id_komentar = ($id_komentar) ? $id_komentar : null;
            $komentar->nama        = $req->nama;
            $komentar->email       = $req->email;
            $komentar->komentar    = $req->komentar;
            $komentar->rating      = ($id_komentar || !($req->rating)) ? 0 : $req->rating;
            $komentar->url = \Request::url();
            $komentar->session_id = \Request::getSession()->getId();
            $komentar->id_user = (\Auth::check())?\Auth::id():null;
            $komentar->ip = \Request::getClientIp();
            $komentar->agent = \Request::header('User-Agent');
            $komentar->save();
            $berita->rating = ceil($berita->komentar->avg('rating')); 
            $berita->save();
            $berita->increment('comment_count');
            $berita->decrement('visit_count');
            return redirect(route('deber',['id'=>$id, 'slug'=>str_slug($berita->judul)]).'#'.$komentar->id)->with('status','Pesan / Komentar Telah dikirim!');
        }else 
        {
            return redirect()->route('berall');
        }
    }
    public function rodio()
    {
        try{
            $rodioObj = Pidio::where('ok','=',1)->orderBy('updated_at','desc')->paginate(3);
            return view('muka.ednes',['rodioObj'=>$rodioObj]);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    } 
    public function carisanggota()
    {

        $title = 'Data Anggota';
        $propil =Profil::all();
        $jumlah_anggota = Anggota::count();
        $jumlah_cabang = Cabang::count();
        $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto'); }])->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
            $jenisBeritaObj = JenisBerita::all();
           $data = Anggota::OrderBy ('updated_at', 'asc')->get();
           return view('muka.anggota.home',['title'=>$title,'data' => $data, 'jumlah_anggota' => $jumlah_anggota, 'jumlah_cabang' => $jumlah_cabang, 'propil'=>$propil, 'putryObj'=>$putryObj, 'jenisBeritaObj' => $jenisBeritaObj]);

    }
    public function profilsanggota($id)
    {

        $title = 'Profil Anggota';
        $propil =Profil::all();
        $jumlah_anggota = Anggota::count();
        $jumlah_cabang = Cabang::count();
        $anggotas = Anggota::findOrFail($id);

        $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto'); }])->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
            $jenisBeritaObj = JenisBerita::all();
           $data = Anggota::OrderBy ('updated_at', 'asc')->get();
           return view('muka.anggota.profilsanggota',['title'=>$title,'data' => $data, 'anggotas' => $anggotas, 'jumlah_anggota' => $jumlah_anggota, 'jumlah_cabang' => $jumlah_cabang, 'propil'=>$propil, 'putryObj'=>$putryObj, 'jenisBeritaObj' => $jenisBeritaObj]);

    }
}
