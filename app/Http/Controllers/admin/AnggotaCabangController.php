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

class AnggotaCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cabang)
    {
        if (Auth::User()->aturan== 'ijo'){
            try {
                if(!$cabang)
            {
                return redirect()->route('cabang.index');
            }
            $title = 'Data Anggota di Cabang';
            $data = AnggotaCabang::all()->where('id_cabang','=',$cabang);
            $cabang = Cabang::find($cabang);
            return view('belakang.anggotacabang.home',['title' => $title, 'cabang' => $cabang,'data' => $data]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cabang, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Tambah Data Anggota Cabang';
            $cabang = Cabang::find($cabang);
            $anggota = Anggota::all()->where('status_anggota_cabang','=','Belum Masuk');            
            return view('belakang.anggotacabang.create', ['title' => $title, 'cabang' => $cabang, 'anggota' => $anggota]);
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
    public function store(Request $request, $cabang, $id = null)
    {
        if (Auth::User()->aturan== 'ijo'){
             
            $anggotacabangs = AnggotaCabang::create([
                'id_ad' => $request->User()->id,
                'id_anggota' => $request->input('id_anggota'),
                'id_cabang' => $cabang,
            ]);
            return redirect()->route('anggotacabang.index',$cabang)->with('success', "anggotacabang sudah ditambahkan.");
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
    public function show($cabang, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $anggotacabang = AnggotaCabang::findOrFail($id);
                $cabang = Cabang::findOrFail($cabang);
                $params = [
                    'title' => 'Hapus Anggota Cabang',
                    'cabang' => $cabang,
                    'anggotacabang' => $anggotacabang,
                ];
                return view('belakang.anggotacabang.delete')->with($params);
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

    public function lihatss($cabang)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            { 
                $cabang = Cabang::findOrFail($cabang);
                $anggotacabang = AnggotaCabang::all()->where('id_cabang','=',$cabang);
                $params = [
                    'title' => 'Hapus Anggota Cabang',
                    'cabang' => $cabang, 
                    'anggotacabang' => $anggotacabang, 
                ];
                return view('belakang.anggotacabang.lihat')->with($params);
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
    public function edit($cabang, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $anggotacabang = AnggotaCabang::findOrFail($id);
                $cabang = Cabang::findOrFail($cabang);
                $anggota = Anggota::all()->where('status_anggota_cabang','=','Belum Masuk');
                $params = [
                    'title' => 'Ubah Data Anggota Cabang',
                    'anggotacabang' => $anggotacabang,
                    'cabang' => $cabang,
                    'anggota' => $anggota,
                ];

                return view('belakang.anggotacabang.edit')->with($params);
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
    public function update(Request $request, $cabang, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            { 

                $anggotascabangs = AnggotaCabang::findOrFail($id);
                $anggotascabangs->id_anggota = $request->input('id_anggota');;
                $anggotascabangs->id_ad = $request->User()->id;
                $anggotascabangs->save();
                return redirect()->route('anggotacabang.index',$cabang)->with('success', "Anggota Cabang berhasil diubah.");
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
    public function destroy(Request $req, $cabang, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('');
                $anggotacabangs = AnggotaCabang::findOrFail($id);

                $should_delete = true;
                foreach($relationships as $r) {
                    if ($anggotacabangs->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('anggotacabang.index',$cabang)->with('error', "Anggota Cabang  <strong>$anggotacabangs->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $anggotacabangs->id_de = $req->User()->id;
                    $anggotacabangs->save();
                    $anggotacabangs->delete();
                    return redirect()->route('anggotacabang.index',$cabang)->with('success', "Anggota Cabang  <strong>$anggotacabangs->nama</strong> sudah dihapus (Arsip).");
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
