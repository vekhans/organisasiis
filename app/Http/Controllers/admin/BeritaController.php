<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\JenisArsip;
use App\Models\models\Arsip;
use App\Models\models\JenisBerita;
use App\Models\models\Berita;
use App\Models\models\Pidio;
use App\Models\models\Profil;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Data Berita'; 
            $data = Berita::OrderBy ('updated_at', 'desc')->paginate();
            $jenisberita = JenisBerita::all();
            return view('belakang.berita.home',['title'=>$title,'data' => $data,'jenisberita' => $jenisberita]);
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    public function generatePDF()
     {
        $title = 'Data Berita'; 
            $data = Berita::OrderBy ('id','asc')->get();
            $jenisberita = JenisBerita::all(); 
         $pdf = PDF::loadView('belakang.berita.semua.pdfpublish', ['title'=>$title,'data' => $data,'jenisberita' => $jenisberita]);
        //return $pdf->download('laporan-pdf.pdf');
        return $pdf->stream();
    } 
    public function genPDF($id=null,$slug=null)
    {
             try{
            if($id && $slug) {
                $berita = Berita::find($id);
                if($berita->exists()) {
                    // $berita->increment('visit_count');
                    // \App\models\Liat::createViewLog($berita);
                    $jenisBeritaObj = JenisBerita::all(); 
                     
                    $data =Berita::OrderBy('rating','desc')->get();
                    $title = ucwords($berita->judul);
                     
                    $pdf = PDF::loadView('muka.admindetail_beritapdf',['title'=>$title, 'berita'=>$berita, 'jenisBeritaObj'=>$jenisBeritaObj, 'data'=>$data]);
                    //return $pdf->download('laporan-pdf.pdf');
                    return $pdf->stream();
                }
                else {
                    return redirect()->route('berita.index');                
                }
            }
            else {
                    return redirect()->route('berita.index');                
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
    public function pablis(Request $request)
    {
        if (Auth::User()->aturan== 'ijo' or  Auth::User()->aturan== 'kuning'){
            $title = 'Data Berita Publish'; 
            $id = $request->User()->id;
            $admin = User::findOrFail($id);
            if($admin->exists()) {
                $data = Berita::where('ok','=',1)->where('id_admin','=',$id)->orderBy('brubah','desc')->get();
            $jenisberita = JenisBerita::all();
            return view('belakang.berita.pablis',['title' => $title, 'data' => $data, 'id' => $id, 'admin' => $admin,'jenisberita' => $jenisberita]);
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    public function unpablis(Request $request)
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Data Berita Belum Publish';
            $id = $request->User()->id;
            $admin = User::findOrFail($id);
            if($admin->exists()) {
                $data = Berita::where('ok','!=',1)->where('id_admin','=',$id)->orderBy('brubah','desc')->get();
            $jenisberita = JenisBerita::all();
            return view('belakang.berita.unpablis',['title' => $title, 'data' => $data, 'id' => $id, 'admin' => $admin,'jenisberita' => $jenisberita]);
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::User()->aturan== 'ijo'){
            $jenisberita = JenisBerita::all();
            $params = [
                'title' => 'Tambah Berita',
                'jenisberita' => $jenisberita,
            ];
            return view('belakang.berita.create')->with($params);
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::User()->aturan== 'ijo' or  Auth::User()->aturan== 'kuning'){
            $this->validate($request, [
                'judul' => 'required|unique:beritas',
                'id_jenis'  => 'required',
                'deskripsi'  => 'required',
                'rating'  => 'required',
            ]);

            $beritas = Berita::create([
                'judul'         => $request->input('judul'),
                'id_jenis'      => $request->input('id_jenis'),
                'deskripsi'     => $request->input('deskripsi'),
                'keterangan'    => $request->input('keterangan'),
                'id_admin'      =>$request->User()->id,
                'id_ad'         =>$request->User()->id,
                'brubah'        =>DB::raw('CURRENT_TIMESTAMP'),
                'publish_at'    =>DB::raw('CURRENT_TIMESTAMP'),
                'publish'       => 'belum',
                'ok'            => 0, 
                'rating'        => $request->rating,
            ]);
            return redirect()->route('berita.index')->with('success', "Berita dengan judul <strong>$beritas->judul</strong> sudah ditambahkan.");
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
                $beritas = Berita::findOrFail($id);
                $params = [
                    'title' => 'Hapus Berita',
                    'beritas' => $beritas,
                ];
                return view('belakang.berita.delete')->with($params);
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    public function publishit(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $berita = Berita::findOrFail($id);
                $berita->id_publish = $request->User()->id;
                $berita->publish_at  = DB::raw('CURRENT_TIMESTAMP');
                $berita->publish  = 'publish';
                $berita->ok  = 1;
                $berita->save();
                return redirect()->route('adeber',['id'=>$berita->id,'slug'=>str_slug($berita->judul)])->with('success', "Berita dengan judul <strong>$berita->judul</strong> berhasil di PUBLIKASI."); 
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    public function unpublishit(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $berita = Berita::findOrFail($id);
                $berita->id_publish = $request->User()->id;
                $berita->publish_at  = DB::raw('CURRENT_TIMESTAMP');
                $berita->publish  = 'belum';
                $berita->ok  = 0;
                $berita->save();
                return redirect()->route('adeber',['id'=>$berita->id,'slug'=>str_slug($berita->judul)])->with('success', "Berita dengan judul <strong>$berita->judul</strong> berhasil ditarik dari Publik.!!!");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $beritas = Berita::findOrFail($id);
                $jenisberita= JenisBerita::all();
                $params = [
                    'title' => 'Ubah Berita',
                    'beritas' => $beritas,
                    'jenisberita' => $jenisberita,
                ];
                return view('belakang.berita.edit')->with($params);
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'judul' => 'required|unique:beritas,judul,'.$id,
                    'id_jenis'  => 'required',
                    'deskripsi'  => 'required', 
                ]);
                $berita = Berita::findOrFail($id);
                $berita->judul = $request->input('judul');
                $berita->deskripsi = $request->input('deskripsi');
                $berita->id_jenis = $request->input('id_jenis');
                $berita->keterangan = $request->input('keterangan');
                $berita->id_admin = $request->User()->id;
                $berita->brubah  = DB::raw('CURRENT_TIMESTAMP');
                $berita->save();
                return redirect()->route('berita.index')->with('success', "Berita dengan judul <strong>$berita->judul</strong> berhasil diubah.");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else
        {
            return view('layouts.temp.hak');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('allKomentar');
                $beritas = Berita::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($beritas->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('berita.index')->with('error', "Berita  <strong>$beritas->judul</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $beritas->id_de = $req->User()->id;
                    $beritas->save();
                    $beritas->delete();
                    return redirect()->route('berita.index')->with('success', "Berita  <strong>$beritas->judul</strong> sudah dihapus (Arsip).");
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
        else
        {
            return view('layouts.temp.hak');
        }
    
    }
    public function adeber($id=null,$slug=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
            if($id && $slug) {
                $berita = Berita::find($id);
                if($berita->exists()) {
                    // $berita->increment('visit_count');
                    // \App\models\Liat::createViewLog($berita);
                    $jenisBeritaObj = JenisBerita::all(); 
                    $propil = Profil::all(); 
                    $sberitaObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                        $query->where('jenis','=','foto');
                    }])->orderBy('brubah','desc')->offset(1,$berita)->limit(2)->get();
                    $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                        $query->where('jenis','=','foto');
                    }])->OrderBy('updated_at','desc')->OrderBy('rating','desc')->limit(4)->get();
                    $jenisBeritaObjR = JenisBerita::all();                
                    $berupdateObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto');
                    }])->OrderBy('brubah','desc')->offset(1, $berita )->paginate(3);
                    $title = ucwords($berita->judul);
                    $siIga =Pidio::OrderBy('updated_at','desc')->limit(2)->get();
                    $marvein =Pidio::OrderBy('updated_at','desc')->offset(2)->limit(2)->get();
                    return view('muka.admindetail_berita',['title'=>$title, 'berita'=>$berita, 'propil'=>$propil, 'jenisBeritaObj'=>$jenisBeritaObj,'sberitaObj'=>$sberitaObj,'jenisBeritaObjR'=>$jenisBeritaObjR, 'berupdateObj'=>$berupdateObj, 'putryObj'=>$putryObj, 'siIga'=>$siIga, 'marvein'=>$marvein]);
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
        else
        {
            return view('layouts.temp.hak');
        }
    }      
}
