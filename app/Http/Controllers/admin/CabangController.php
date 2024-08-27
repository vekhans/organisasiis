<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Anggota;
use App\Models\models\AnggotaCabang;
use App\Models\models\Desa;
use App\Models\models\Cabang;
use App\Models\models\Kabupaten;
use Image;
class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
           $title = 'Data Cabang';
           $data = Cabang::OrderBy ('updated_at', 'asc')->get();
           return view('belakang.cabang.home',['title'=>$title,'data' => $data]);
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
              $kabupaten = Kabupaten::all();  
              $anggota = Anggota::all()->where('status_anggota_cabang','=','Belum Masuk');

            $params = [
                'title' => 'Tambah Cabang',
                'kabupaten' => $kabupaten,
                'anggota' => $anggota
            ];
            return view('belakang.cabang.create')->with($params);
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
                'nama' => 'required|unique:cabangs',
                
            ]);
            $anggotas = new Cabang;
                $anggotas->nama                 = $request->nama;
                $anggotas->periode = $request->periode;
                $anggotas->id_kabupaten = $request->id_kabupaten;
                $anggotas->pembina = $request->pembina;
                $anggotas->ketua = $request->ketua;
                $anggotas->wakil_ketua = $request->wakil_ketua;
                $anggotas->sekretaris_1 = $request->sekretaris_1;
                $anggotas->sekretaris_2 = $request->sekretaris_2;
                $anggotas->bendahara_1 = $request->bendahara_1;
                $anggotas->bendahara_2 = $request->bendahara_2;
                $anggotas->kasek_penerimaan = $request->kasek_penerimaan;
                $anggotas->seksek_penerimaan = $request->seksek_penerimaan;
                $anggotas->kasek_penyegaran = $request->kasek_penyegaran;
                $anggotas->seksek_penyegaran = $request->seksek_penyegaran;
                $anggotas->kasek_logistik = $request->kasek_logistik;
                $anggotas->seksek_logistik = $request->seksek_logistik;
                $anggotas->kasek_kesehatan = $request->kasek_kesehatan;
                $anggotas->seksek_kesehatan = $request->seksek_kesehatan;
                $anggotas->kasek_dokumentasi = $request->kasek_dokumentasi;
                $anggotas->seksek_dokumentasi = $request->seksek_dokumentasi;
                $anggotas->id_ad                = $request->User()->id;
                $anggotas->save();

            return redirect()->route('cabang.index')->with('success', "Cabang <strong>$anggotas->nama</strong> sudah ditambahkan.");
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
                $cabangs = Cabang::findOrFail($id);
                $params = [
                    'title' => 'Hapus Video',
                    'cabangs' => $cabangs,
                ];
                return view('belakang.cabang.delete')->with($params);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $kabupaten = Kabupaten::all();  
                $cabang = Cabang::findOrFail($id);
                $anggota = Anggota::all()->where('status_anggota_cabang','=','Belum Masuk');
                $params = [
                    'title' => 'Ubah Data Cabang',
                    'cabang' => $cabang,
                    'kabupaten' => $kabupaten,
                    'anggota' => $anggota,


                ];

                return view('belakang.cabang.edit')->with($params);
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
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'nama' => 'required|unique:cabangs,nama,'.$id,
                ]);
                $cabangs = Cabang::findOrFail($id);
                $cabangs->nama = $request->input('nama');;
                $cabangs->id_ad = $request->User()->id;
                $cabangs->periode = $request->periode;
                $cabangs->id_kabupaten = $request->id_kabupaten;
                $cabangs->pembina = $request->pembina;
                $cabangs->ketua = $request->ketua;
                $cabangs->wakil_ketua = $request->wakil_ketua;
                $cabangs->sekretaris_1 = $request->sekretaris_1;
                $cabangs->sekretaris_2 = $request->sekretaris_2;
                $cabangs->bendahara_1 = $request->bendahara_1;
                $cabangs->bendahara_2 = $request->bendahara_2;
                $cabangs->kasek_penerimaan = $request->kasek_penerimaan;
                $cabangs->seksek_penerimaan = $request->seksek_penerimaan;
                $cabangs->kasek_penyegaran = $request->kasek_penyegaran;
                $cabangs->seksek_penyegaran = $request->seksek_penyegaran;
                $cabangs->kasek_logistik = $request->kasek_logistik;
                $cabangs->seksek_logistik = $request->seksek_logistik;
                $cabangs->kasek_kesehatan = $request->kasek_kesehatan;
                $cabangs->seksek_kesehatan = $request->seksek_kesehatan;
                $cabangs->kasek_dokumentasi = $request->kasek_dokumentasi;
                $cabangs->seksek_dokumentasi = $request->seksek_dokumentasi;
                $cabangs->save();
                return redirect()->route('cabang.index')->with('success', "Cabang <strong> $cabangs->nama</strong> berhasil diubah.");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('cabanganggotacabang');
                $cabangs = Cabang::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($cabangs->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('cabang.index')->with('error', "Cabang  <strong>$cabangs->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $cabangs->id_de = $req->User()->id;
                    $cabangs->save();
                    $cabangs->delete();
                    return redirect()->route('cabang.index')->with('success', "Cabang  <strong>$cabangs->nama</strong> sudah dihapus (Arsip).");
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
