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
class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Data Arsip';
            $propil=Profil::all();
            $data = Arsip::OrderBy ('updated_at', 'desc')->paginate();
            $jenisarsip = JenisArsip::all();
            return view('belakang.arsip.home',['title' => $title, 'propil' => $propil,'data' => $data,'jenisarsip' => $jenisarsip]);
        }
        else{
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
            $jenisarsip = JenisArsip::all();
            $params = [
                'title' => 'Tambah Arsip',
                'jenisarsip' => $jenisarsip,
            ];
            return view('belakang.arsip.create')->with($params);
        }
        else{
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
        if (Auth::User()->aturan== 'ijo'){        
            $this->validate($request, [
                'judul' => 'required|unique:arsips',
                'id_jenis'  => 'required',
                'deskripsi'  => 'required',
                'file'             => 'required|file',
            ]);
            // Upload
            if ($request->hasFile('file')) {
                $dir = 'dok/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = uniqid('arsip_');
                $extension = $file->getClientOriginalExtension();
                $file->move($dir, $filename.'.'.$extension);
                $arsips = Arsip::create([
                    'id_admin'      => $request->User()->id,
                    'judul'         => $request->input('judul'),
                    'id_jenis'      => $request->input('id_jenis'),
                    'deskripsi'     => $request->input('deskripsi'),
                    'keterangan'    => $request->input('keterangan'),
                    'id_ad'         => $request->User()->id,
                    'brubah'        => DB::raw('CURRENT_TIMESTAMP'),
                    'publish_at'    => DB::raw('CURRENT_TIMESTAMP'),
                    'created_at'    => DB::raw('CURRENT_TIMESTAMP'),
                    'file'          => $dir.$filename.'.'.$extension,  
            ]);}
            return redirect()->route('arsip.index')->with('success', "Arsip dengan judul <strong>$arsips->judul</strong> sudah ditambahkan.");
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
                $arsips = Arsip::findOrFail($id);
                $params = [
                    'title' => 'Hapus Arsip',
                    'arsips' => $arsips,
                ];
                return view('belakang.arsip.delete')->with($params);
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $arsips = Arsip::findOrFail($id);
                $jenisarsip= JenisArsip::all();
                $params = [
                    'title' => 'Ubah Arsip',
                    'arsips' => $arsips,
                    'jenisarsip' => $jenisarsip,
                ];
                return view('belakang.arsip.edit')->with($params);
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'judul'     => 'required|unique:arsips,judul,'.$id,
                    'id_jenis'  => 'required',
                    'deskripsi' => 'required',
                ]);
                $arsip = Arsip::findOrFail($id);
                if ($request->hasFile('file')) {
                $dir = 'dok/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = uniqid('e_arsips_');
                $extension = $file->getClientOriginalExtension();
                $file->move($dir, $filename.'.'.$extension);
                $arsip->file      = $dir.$filename.'.'.$extension;
                $arsip->judul = $request->input('judul');
                $arsip->deskripsi = $request->input('deskripsi');
                $arsip->id_jenis = $request->input('id_jenis');
                $arsip->keterangan = $request->input('keterangan');
                $arsip->id_admin = $request->User()->id;
                $arsip->brubah  = DB::raw('CURRENT_TIMESTAMP');
                $arsip->save();
                    return redirect()->route('arsip.index')->with('success', "User <strong>$arsip->judul</strong> sudah diubah.");
                }
                else{
                    $arsip->judul = $request->input('judul');
                    $arsip->deskripsi = $request->input('deskripsi');
                    $arsip->id_jenis = $request->input('id_jenis');
                    $arsip->keterangan = $request->input('keterangan');
                    $arsip->id_admin = $request->User()->id;
                    $arsip->brubah  = DB::raw('CURRENT_TIMESTAMP');
                    $arsip->save(); 
                }
                return redirect()->route('arsip.index')->with('success', "User <strong>$arsip->judul</strong> sudah diubah.");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    public function publishit(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $arsip = Arsip::findOrFail($id);
                $arsip->id_publish = $request->User()->id;
                $arsip->publish_at  = DB::raw('CURRENT_TIMESTAMP');
                $arsip->publish  = 'publish';
                $arsip->ok  = 1;
                $arsip->save();
                return redirect()->route('arsipsip',['id'=>$arsip->id,'slug'=>str_slug($arsip->judul)])->with('success', "Arsip dengan judul <strong>$arsip->judul</strong> berhasil di PUBLIKASI.");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    public function unpublishit(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $arsip = Arsip::findOrFail($id);
                $arsip->id_admin = $request->User()->id;
                $arsip->publish_at  = DB::raw('CURRENT_TIMESTAMP');
                $arsip->publish  = 'belum';
                $arsip->ok  = 0;
                $arsip->save();
                return redirect()->route('arsipsip',['id'=>$arsip->id,'slug'=>str_slug($arsip->judul)])->with('success', "Arsip dengan judul <strong>$arsip->judul</strong> berhasil ditarik dari Publik.!!!");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $pidios = Arsip::findOrFail($id);
                $pidios->id_de = $req->User()->id;
                $pidios->save();
                $pidios->delete();
                return redirect()->route('arsip.index')->with('success', "arsip  <strong>$pidios->caption</strong> sudah dihapus (Arsip).");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    public function arsipsip($id=null,$slug=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
            if($id && $slug) {
                $arsip = Arsip::find($id);
                if($arsip->exists()) {
                    // $arsip->increment('visit_count');
                    // \App\models\Liat::createViewLog($arsip);
                    $jenisBeritaObj = JenisBerita::all(); 
                    $sberitaObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                        $query->where('jenis','=','foto');
                    }])->orderBy('brubah','desc')->limit(2)->get();
                    $putryObj =Berita::where('ok','=',1)->with(['media_berita' => function ($query) {
                        $query->where('jenis','=','foto');
                    }])->OrderBy('updated_at','desc')->OrderBy('rating','desc')->limit(3)->get();
                    $propil= Profil::all();
                    $jenisArsipObj = JenisArsip::all();                
                    $berupdateObj = Berita::where('ok','=',1)->with(['media_berita' => function ($query) { $query->where('jenis','=','foto');
                    }])->OrderBy('brubah','desc')->paginate(3);
                    $title = ucwords($arsip->judul);
                    $siIga =Pidio::OrderBy('updated_at','desc')->limit(2)->get();
                    return view('belakang.arsip.admindetail_arsip',['title'=>$title, 'arsip'=>$arsip, 'jenisBeritaObj'=>$jenisBeritaObj,'sberitaObj'=>$sberitaObj,'jenisArsipObj'=>$jenisArsipObj, 'berupdateObj'=>$berupdateObj, 'propil' => $propil, 'putryObj'=>$putryObj, 'siIga'=>$siIga]);
                }
                else {
                    return redirect()->route('arsipall');                
                }
            }
            else {
                    return redirect()->route('arsipall');                
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
        else{
            return view('layouts.temp.hak');
        }    
    }
}
