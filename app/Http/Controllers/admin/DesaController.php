<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Provinsi;
use App\Models\models\Kabupaten;
use App\Models\models\Kecamatan;
use App\Models\models\Desa;
class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinsi, $kabupaten, $kecamatan )
    {
        if (Auth::User()->aturan== 'ijo'){
            try {
                if(!$provinsi)
                {
                    return redirect()->route('provinsi.index');
                }
                try {
                    if(!$kabupaten)
                    {
                        return redirect()->route('$kabupaten.index', $provinsi->id);
                    }
                    try {
                        if(!$kecamatan)
                        {
                            return redirect()->route('$kecamatan.index', [$provinsi->id, $kabupaten->id]);
                        }
                        $title = 'Data Desa';
                        $data = Desa::all()->where('id_kecamatan','=',$kecamatan);
                        $provinsi = Provinsi::find($provinsi);
                        $kabupaten = Kabupaten::find($kabupaten);
                        $kecamatan = Kecamatan::find($kecamatan);
                        return view('belakang.desa.home',['title' => $title, 'provinsi' => $provinsi, 'kabupaten' => $kabupaten, 'kecamatan' => $kecamatan, 'data' => $data]);
                    }
                    catch (ModelNotFoundException $ex) 
                    {
                        if ($ex instanceof ModelNotFoundException)
                        {
                            return response()->view('errors.'.'404');
                        }
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
    public function create($provinsi, $kabupaten, $kecamatan, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Tambah Data Desa';
            $kecamatan = Kecamatan::find($kecamatan);
            $kabupaten = Kabupaten::find($kabupaten);
            $provinsi = Provinsi::find($provinsi);
            return view('belakang.desa.create', ['title' => $title, 'provinsi' => $provinsi, 'kabupaten' => $kabupaten, 'kecamatan' => $kecamatan]);
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
    public function store(Request $request, $provinsi, $kabupaten, $kecamatan, $id = null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $this->validate($request, [
                'nama' => 'required|unique:desas',
            ]); 
            $desas = Desa::create([
                'id_ad' => $request->User()->id,
                'nama' => $request->input('nama'),
                'id_kecamatan' => $kecamatan,
                
            ]);
            return redirect()->route('desa.index',[$provinsi, $kabupaten, $kecamatan])->with('success', "Kecamatan <strong>$desas->nama</strong> sudah ditambahkan.");
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
    public function show($provinsi, $kabupaten, $kecamatan, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $provinsi = Provinsi::findOrFail($provinsi);
                $kabupaten = Kabupaten::findOrFail($kabupaten);
                $kecamatan = Kecamatan::findOrFail($kecamatan);
                $desa = Desa::findOrFail($id);
                $params = [
                    'title' => 'Hapus Kecamatan',
                    'provinsi' => $provinsi,
                    'kabupaten' => $kabupaten,
                    'kecamatan' => $kecamatan,
                    'desa' => $desa,

                ];
                return view('belakang.desa.delete',[$provinsi, $kabupaten, $kecamatan])->with($params);
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
    public function edit($provinsi, $kabupaten, $kecamatan, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $desa = Desa::findOrFail($id);
                $provinsi = Provinsi::findOrFail($provinsi);
                $kabupaten = Kabupaten::findOrFail($kabupaten);
                $kecamatan = Kecamatan::findOrFail($kecamatan);
                $params = [
                    'title' => 'Ubah Data Kecamatan',
                    'desa' => $desa,
                    'kecamatan' => $kecamatan,
                    'kabupaten' => $kabupaten,
                    'provinsi' => $provinsi,

                ];

                return view('belakang.desa.edit',[$provinsi, $kabupaten, $kecamatan])->with($params);
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
    public function update(Request $request, $provinsi, $kabupaten, $kecamatan, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'nama' => 'required|unique:desas,nama,'.$id,
                ]);

                $desas = Desa::findOrFail($id);
                $desas->nama = $request->input('nama');;
                $desas->id_ad = $request->User()->id;
                $desas->save();
                return redirect()->route('desa.index',[$provinsi, $kabupaten, $kecamatan])->with('success', "Desa <strong> $desas->nama</strong> berhasil diubah.");
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
    public function destroy(Request $req, $provinsi, $kabupaten, $kecamatan, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('desaidanggota');
                $desas = Desa::findOrFail($id);

                $should_delete = true;
                foreach($relationships as $r) {
                    if ($desas->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('desa.index',[$provinsi, $kabupaten, $kecamatan])->with('error', "Desa  <strong>$desas->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $desas->id_de = $req->User()->id;
                    $desas->save();
                    $desas->delete();
                    return redirect()->route('desa.index',[$provinsi, $kabupaten, $kecamatan])->with('success', "Desa  <strong>$desas->nama</strong> sudah dihapus (Arsip).");
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
