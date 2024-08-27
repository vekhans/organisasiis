<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\models\JenisBerita;
use Illuminate\Support\Facades\DB;
 
class JenisBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            $title ='Jenis Berita';
            $data = JenisBerita::OrderBy ('updated_at', 'desc')->get();
            return view('belakang.jenisberita.home',['title' => $title, 'data' => $data]);
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
                'title' => 'Tambah Jenis Berita',
            ];
            return view('belakang.jenisberita.create')->with($params);
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
                'jenis' => 'required|unique:jenis_beritas',
            ]);
            $jenisberitas = JenisBerita::create([
                'id_admin' => $request->User()->id,
                'id_ad' => $request->User()->id,
                'jenis' => $request->input('jenis'),
            ]);
            return redirect()->route('jenisberita.index')->with('success', "Jenis Berita <strong>$jenisberitas->jenis</strong> sudah ditambahkan.");
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Jenis_Berita  $Jenis_Berita
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBerita $JenisBerita, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
                $jenisberitas = JenisBerita::findOrFail($id);

                $params = [
                    'title' => 'Hapus Jenis Beritas',
                    'jenisberitas' => $jenisberitas,
                ];

                return view('belakang.jenisberita.delete')->with($params);
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
     * @param  \App\models\Jenis_Berita  $Jenis_Berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $jenisberitas = JenisBerita::findOrFail($id);

                $params = [
                    'title' => 'Ubah Jenis Berita',
                    'jenisberitas' => $jenisberitas,
                ];
                return view('belakang.jenisberita.edit')->with($params);
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
     * @param  \App\models\Jenis_Berita  $Jenis_Berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'jenis' => 'required|unique:jenis_beritas,jenis,'.$id,
                ]);
                $jenisberitas = JenisBerita::findOrFail($id);
                $jenisberitas->jenis = $request->input('jenis');
                $jenisberitas->id_admin = $request->User()->id;
                $jenisberitas->save();
                return redirect()->route('jenisberita.index')->with('success', "Jenis Berita <strong>$jenisberitas->jenis</strong> berhasil diubah.");
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
     * @param  \App\models\Jenis_Berita  $Jenis_Berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $relationships = array('jenis_berita');
                $jenis_beritas = JenisBerita::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($jenis_beritas->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('jenisberita.index')->with('error', "Jenis Berita <strong>$jenis_beritas->jenis</strong> tidak bisa dihapus karna sudah dipakai pada data berita.");
                    }
                }
                if ($should_delete == true) {
                    $jenis_beritas->id_de = $req->User()->id;
                    $jenis_beritas->save();
                    $jenis_beritas->delete();
                    return redirect()->route('jenisberita.index')->with('success', "Jenis Berita <strong>$jenis_beritas->jenis</strong> sudah dihapus (Arsip).");
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
