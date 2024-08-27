<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Anggota;
use App\Models\models\Desa;
use App\Models\models\Cabang;
use Image;
class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
           $title = 'Data Anggota';
           $data = Anggota::OrderBy ('updated_at', 'asc')->get();
           return view('belakang.anggota.home',['title'=>$title,'data' => $data]);
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
            $desa = Desa::all();
            $params = [
                'title' => 'Tambah Anggota',
                'jenis_kelamin'  => (['Laki-laki','Perempuan']),
                'agama'  => (['Kristen Katolik','Kristen Protes','Islam','Hindu','Budha','Konghuchu']),
                'desa' => $desa,
            ];
            return view('belakang.anggota.create')->with($params);
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
    public function store(Request $req)
    {
        if (Auth::User()->aturan== 'ijo'){
            $this->validate($req, [
                'nama' => 'required',
                'email'                 => 'required|email|unique:anggotas,email|max:100',
                'file'                  => 'required|file', 
            ]);
            if ($req->hasFile('file') ) {
                $dir = 'media/anggota/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                 
                $file      = $req->file;
                                $thumbnail      = $post['thumbnail'];
                $filename  = 'a'.uniqid();
                $extension = $file->getClientOriginalExtension();
                $path           = public_path($dir. $filename.'.'.$extension);
                $thumbnailResize= Image::make($file->path());
                $thumbnailResize->resize(200, 140);
                $thumbnailResize->save($path);
                $anggotas = new Anggota;
                $anggotas->nama                 = $req->nama;
                $anggotas->nik                  = $req->nik;
                $anggotas->nokta                = $req->nokta;
                $anggotas->email                = $req->email;
                $anggotas->agama                = $req->agama;
                $anggotas->file                 = $dir.$filename.'.'.$extension;
                $anggotas->alamat               = $req->alamat;
                $anggotas->jenis_kelamin        = $req->jenis_kelamin;
                $anggotas->tlpn                 = $req->tlpn;
                $anggotas->id_ad                = $req->User()->id;
                $anggotas->save();
                return redirect()->route('anggota.index')->with('success', "Anggota <strong>$anggotas->nama</strong> sudah ditambahkan.");
            }else
            {
                $anggotas = new Anggota;
                $anggotas->nama                 = $req->nama;
                $anggotas->nokta                = $req->nokta;
                $anggotas->nik                  = $req->nik;
                $anggotas->email                = $req->email;
                $anggotas->agama                = $req->agama;
                $anggotas->file                 = $dir.$filename.'.'.$extension;
                $anggotas->alamat               = $req->alamat;
                $anggotas->jenis_kelamin        = $req->jenis_kelamin;
                $anggotas->tlpn                 = $req->tlpn;
                $anggotas->id_ad                = $req->User()->id;
                $anggotas->save(); 
            }
            return redirect()->route('anggota.index')->with('success', "User <strong>$anggotas->nama</strong> sudah ditambahkan.");
        }
        else{
            return view('layouts.temp.hak');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $anggotas = Anggota::findOrFail($id);
                $params = [
                    'title' => 'Hapus Anggota',
                    'anggotas' => $anggotas,
                ];
                return view('belakang.anggota.delete')->with($params);
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

    public function detailanggota($id)
    {
           try
            {
                $anggotas = Anggota::findOrFail($id);
                $params = [
                    'title' => 'Profl Anggota',
                    'anggotas' => $anggotas,
                ];
                return view('belakang.anggota.detailanggota')->with($params);
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        } 
    






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function epernikahan($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $pernikahan = Anggota::findOrFail($id);
                $params = [
                    'title' => 'Ubah Data Pernikahan',
                    'pernikahan' => $pernikahan,
                ];

                return view('belakang.anggota.epernikahan')->with($params);
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

    public function uppernikahan(Request $request, $id)
    {        
        try
        {

            $this->validate($request, [
                'tanggal_aktanikah' => 'required',
                'no_aktanikah' => 'required',  
            ]);
            
            $pernikahan = Anggota::findOrFail($id);
                if ($request->hasFile('file')) {
                $dir = 'dok/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = uniqid('e_pernikahans_');
                $extension = $file->getClientOriginalExtension();
                $file->move($dir, $filename.'.'.$extension);
                
                $pernikahan->file_aktanikah      = $dir.$filename.'.'.$extension;
                $pernikahan->no_aktanikah = $request->input('no_aktanikah');
                $pernikahan->tanggal_aktanikah  = $request->input('tanggal_aktanikah');
                $pernikahan->save();
                    return redirect()->route('anggota.index')->with('success', "Akta Pernikahan <strong>$pernikahan->nama</strong> sudah diubah.");
            }else
            {
                $pernikahan->no_aktanikah = $request->input('no_aktanikah');
                $pernikahan->tanggal_aktanikah  = $request->input('tanggal_aktanikah');
                $pernikahan->save();
             $pernikahan->save(); 
            }
            return redirect()->route('anggota.index')->with('success', "Akta Pernikahan <strong>$pernikahan->nama</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    public function epengesahan($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $pengesahan = Anggota::findOrFail($id);
                $params = [
                    'title' => 'Ubah Bagan Organisasi',
                    'pengesahan' => $pengesahan,
                ];

                return view('belakang.anggota.epengesahan')->with($params);
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

    public function uppengesahan(Request $request, $id)
    {        
        try
        {
            $this->validate($request, [
                'tanggal_pengesahan' => 'required',
                'no_pengesahan' => 'required',  
            ]);
            $pengesahan = Anggota::findOrFail($id);
                if ($request->hasFile('file')) {
                $dir = 'pengesahan/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = uniqid('e_pengesahan_');
                $extension = $file->getClientOriginalExtension();
                $file->move($dir, $filename.'.'.$extension);
                
                $pengesahan->file_pengesahan      = $dir.$filename.'.'.$extension;
                $pengesahan->no_pengesahan = $request->input('no_pengesahan');
                $pengesahan->tanggal_pengesahan  = $request->input('tanggal_pengesahan');
                $pengesahan->save();
                    return redirect()->route('anggota.index')->with('success', "Pengesahan <strong>$pengesahan->nama</strong> sudah diubah.");
            }else
            {
                $pengesahan->no_pengesahan = $request->input('no_pengesahan');
                $pengesahan->tanggal_pengesahan  = $request->input('tanggal_pengesahan');
                $pengesahan->save();
             $pengesahan->save(); 
            }
            return redirect()->route('anggota.index')->with('success', "Pengesahan <strong>$pengesahan->nama</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    
    public function epermandian($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $permandian = Anggota::findOrFail($id);
                $params = [
                    'title' => 'Ubah Bagan Organisasi',
                    'permandian' => $permandian,
                ];

                return view('belakang.anggota.epermandian')->with($params);
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

    public function uppermandian(Request $request, $id)
    {        
        try
        {
            $this->validate($request, [
                'tanggal_permandian' => 'required',
                'no_permandian' => 'required',  
            ]);            
            $rekom = Anggota::findOrFail($id);
                if ($request->hasFile('file')) {
                $dir = 'permandian/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = uniqid('e_mandi');
                $extension = $file->getClientOriginalExtension();
                $file->move($dir, $filename.'.'.$extension);
                
                $rekom->file_permandian      = $dir.$filename.'.'.$extension;
                $rekom->no_permandian = $request->input('no_permandian');
                $rekom->tanggal_permandian  = $request->input('tanggal_permandian');
                $rekom->save();
                    return redirect()->route('anggota.index')->with('success', "permandian <strong>$rekom->nama</strong> sudah diubah.");
            }else
            {
                $rekom->no_permandian = $request->input('no_permandian');
                $rekom->tanggal_permandian  = $request->input('tanggal_permandian');
                $rekom->save();
             
            } 
            return redirect()->route('anggota.index')->with('success', "permandian <strong>$rekom->nama</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }


    public function erekom($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $rekomcabang = Anggota::findOrFail($id);
                $params = [
                    'title' => 'Ubah Bagan Organisasi',
                    'rekomcabang' => $rekomcabang,
                ];

                return view('belakang.anggota.eprekom')->with($params);
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

    public function uprekom(Request $request, $id)
    {        
        try
        {
            $this->validate($request, [
                'tanggal_rekomcabang' => 'required',
                'no_rekomcabang' => 'required',  
            ]);         

            $rekom = Anggota::findOrFail($id);
                if ($request->hasFile('file')) {
                $dir = 'rekom/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                // Upload
                $file      = $request->file;
                $filename  = uniqid('e_rekom_');
                $extension = $file->getClientOriginalExtension();
                $file->move($dir, $filename.'.'.$extension);
                
                $rekom->file_rekomcabang      = $dir.$filename.'.'.$extension;
                $rekom->no_rekomcabang = $request->input('no_rekom');
                $rekom->tanggal_rekomcabang  = $request->input('tanggal_rekomcabang');
                $rekom->save();
                    return redirect()->route('anggota.index')->with('success', "Rekomendasi <strong>$rekom->nama</strong> sudah diubah.");
            }else
            {
                $rekom->no_rekomcabang = $request->input('no_rekomcabang');
                $rekom->tanggal_rekomcabang  = $request->input('tanggal_rekomcabang');
                $rekom->save();
       
            }
            return redirect()->route('anggota.index')->with('success', "Rekomendasi <strong>$rekom->nama</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }



    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $anggotas = Anggota::findOrFail($id);
                $desa = Desa::all();
            $params = [
                'title' => 'Tambah Anggota',
                'jenis_kelamin'  => (['Laki-laki','Perempuan']),
                'agama'  => (['Kristen Katolik','Kristen Protes','Islam','Hindu','Budha','Konghuchu']),
                'desa' => $desa,
                'anggotas' => $anggotas,

            ];

                return view('belakang.anggota.edit')->with($params);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        try
        {
            $this->validate($request, [
                'nama' => 'required',
                 
                'email'    => 'required|email|unique:anggotas,email,'.$id.'|max:100',
                'file'                  => 'required|file',
                   
                 
            ]);
            $anggota = Anggota::findOrFail($id);
            if ($request->hasFile('file') ) {
                $dir = 'media/anggota/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                 
                $file      = $request->file;
                $filename  = 'a_'.uniqid();
                $extension = $file->getClientOriginalExtension();
                $path           = public_path($dir. $filename.'.'.$extension);
                $thumbnailResize= Image::make($file->path());
                $thumbnailResize->resize(300, 240);
                $thumbnailResize->save($path);
                $anggota->nama = $request->nama;
               $anggota->nik                  = $request->nik;
                $anggota->nokta                = $request->nokta;
                $anggota->email                = $request->email;
                $anggota->agama                = $request->agama;
                $anggota->file                 = $dir.$filename.'.'.$extension;
                $anggota->alamat               = $request->alamat;
                $anggota->jenis_kelamin        = $request->jenis_kelamin;
                $anggota->tlpn                 = $request->tlpn;
                $anggota->id_ad                = $request->User()->id;
                $anggota->save();
                return redirect()->route('anggota.index')->with('success', "Anggota <strong>$anggota->nama</strong> sudah diubah.");
            }else
            {
                $anggota->nama = $request->nama;
               $anggota->nik                  = $request->nik;
                $anggota->nokta                = $request->nokta;
                $anggota->email                = $request->email;
                $anggota->agama                = $request->agama;
                $anggota->alamat               = $request->alamat;
                $anggota->jenis_kelamin        = $request->jenis_kelamin;
                $anggota->tlpn                 = $request->tlpn;
                $anggota->id_ad                = $request->User()->id;
                $anggota->save(); 
            }
            return redirect()->route('anggota.index')->with('success', "User <strong>$anggota->nama</strong> sudah diubah.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('anggotapembina','anggotaketua','anggotawakilketua','anggotasek1','anggotasek2','anggotabend1','anggotabend2','anggotakasekpenerimaan','anggotaseksekpenerimaan','anggotakasekkesehatan','anggotaseksekkesehatan','anggotakaseklogistik','anggotasekseklogistik','anggotakasekpenyegaran','anggotaseksekpenyegaran','anggotakasekdokumentasi','anggotaseksekdokumentasi','anggotasanggotacab');
                $anggotas = Anggota::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($anggotas->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('anggota.index')->with('error', "Anggota  <strong>$anggotas->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $anggotas->id_de = $req->User()->id;
                    $anggotas->save();
                    $anggotas->delete();
                    return redirect()->route('anggota.index')->with('success', "Anggota  <strong>$anggotas->nama</strong> sudah dihapus (Arsip).");
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
