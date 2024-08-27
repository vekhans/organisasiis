<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Provinsi;
class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
           $title = 'Data Provinsi';
           $data = Provinsi::OrderBy ('updated_at', 'desc')->get();
           return view('belakang.provinsi.home',['title'=>$title,'data' => $data]);
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
            $params = [
                'title' => 'Tambah Provinsi',
            ];
            return view('belakang.provinsi.create')->with($params);
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
                'nama' => 'required|unique:provinsis',
                
            ]);
            $provinsis = Provinsi::create([
                'id_ad' => $request->User()->id,
                'nama' => $request->input('nama'),
                
            ]);
            return redirect()->route('provinsi.index')->with('success', "Provinsi <strong>$provinsis->Caption</strong> sudah ditambahkan.");
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
                $provinsis = Provinsi::findOrFail($id);
                $params = [
                    'title' => 'Hapus Video',
                    'provinsis' => $provinsis,
                ];
                return view('belakang.provinsi.delete')->with($params);
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
                $provinsis = Provinsi::findOrFail($id);
                $params = [
                    'title' => 'Ubah Data Provinsi',
                    'provinsis' => $provinsis,
                ];

                return view('belakang.provinsi.edit')->with($params);
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
                    'nama' => 'required|unique:provinsis,nama,'.$id,
                ]);
                $provinsis = Provinsi::findOrFail($id);
                $provinsis->nama = $request->input('nama');;
                $provinsis->id_ad = $request->User()->id;
                $provinsis->save();
                return redirect()->route('provinsi.index')->with('success', "Provinsi <strong> $provinsis->nama</strong> berhasil diubah.");
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
                $relationships = array('providkab');
                $provinsis = Provinsi::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($provinsis->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('provinsi.index')->with('error', "Provinsi  <strong>$provinsis->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $provinsis->id_de = $req->User()->id;
                    $provinsis->save();
                    $provinsis->delete();
                    return redirect()->route('provinsi.index')->with('success', "Provinsi  <strong>$provinsis->nama</strong> sudah dihapus (Arsip).");
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
