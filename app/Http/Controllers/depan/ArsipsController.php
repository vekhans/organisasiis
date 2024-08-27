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
use App\Models\models\Pidio;
use App\Models\models\Profil;
class ArsipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ket=null, $ket2=null)
    {
        $title     = 'Arsip ';
        $arsipObj = Arsip::where('ok','=',1)->orderBy('brubah','desc');
        $propil = Profil::all();
        $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto'); }])->OrderBy('rating','desc')->OrderBy('updated_at','desc')->limit(3)->get();
        $rockyObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto'); }])->OrderBy('brubah','desc')->OrderBy('updated_at','desc')->limit(6)->get();
        if($ket2) {
            $ket2 = explode("-", $ket2);
            $ket2 = array_shift($ket2);
        }
        $id_jenis  = null;
        if($ket == 'kategori' && $ket2 != null) {
            $id_jenis = $ket2;
            $arsipObj->where('ok','=',1)->where('id_jenis','=',$ket2);
        }
        $jenisBeritaObj = JenisBerita::all();
        $jenisArsipObj = JenisArsip::all();
        $siIga =Pidio::OrderBy('updated_at','desc')->limit(1)->get();
        return view('muka.arsips',['title'=>$title, 'putryObj'=>$putryObj, 'jenisBeritaObj'=>$jenisBeritaObj, 'siIga'=>$siIga, 'jenisArsipObj'=>$jenisArsipObj, 'id_jenis'=>$id_jenis, 'propil'=>$propil, 'rockyObj'=>$rockyObj, 'arsipObj'=>$arsipObj->paginate(7)]);
    }

    public function arsips($id=null,$slug=null)
    {
        try{
        if($id && $slug) {
            $arsip = Arsip::where('ok','=',1)->find($id);
            if($arsip->exists()) {
                // $arsip->increment('visit_count');
                // \App\models\Liat::createViewLog($arsip);
                $jenisBeritaObj = JenisBerita::all(); 
                $propil = Profil::all(); 
                $sberitaObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                    $query->where('jenis','=','foto');
                }])->orderBy('brubah','desc')->limit(2)->get();
                $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                    $query->where('jenis','=','foto');
                }])->OrderBy('updated_at','desc')->OrderBy('rating','desc')->limit(3)->get();
                $jenisArsipObj = JenisArsip::all();                
                $berupdateObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto');
                }])->OrderBy('brubah','desc')->paginate(3);
                $title = ucwords($arsip->judul);
                $siIga =Pidio::OrderBy('updated_at','desc')->limit(2)->get();
                return view('muka.detail_arsip',['title'=>$title,  'propil'=>$propil, 'arsip'=>$arsip, 'jenisBeritaObj'=>$jenisBeritaObj,'sberitaObj'=>$sberitaObj,'jenisArsipObj'=>$jenisArsipObj, 'berupdateObj'=>$berupdateObj, 'putryObj'=>$putryObj, 'siIga'=>$siIga]);
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
   
}
