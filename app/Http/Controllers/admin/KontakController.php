<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\models\Kontak;
use Apa\Models\User;
class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
                $title        = 'Kontak ';
                $data = Kontak::OrderBy ('id', 'desc')->get();
                return view('belakang.kontak.home',['data' => $data, 'title' => $title]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
                $kontak = Kontak::findOrFail($id);
                $params = [
                    'title' => 'Hapus Kontak',
                    'kontak' => $kontak,
                ];
                return view('belakang.kontak.delete')->with($params);
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
                $kontak = Kontak::findOrFail($id);
                $params = [
                    'title' => 'Ubah Kontak',
                    'kontak' => $kontak,
                ];
                return view('belakang.kontak.edit')->with($params);
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
     * @param  \App\models\kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'nama'  => 'required',
                'email'  => 'required',
                'komentar'  => 'required', 
                ]);
                $kontak = Kontak::findOrFail($id);
                $kontak->nama = $request->input('nama');
                $kontak->email = $request->input('email');
                $kontak->komentar = $request->input('komentar');
                $kontak->perihal = $request->input('perihal');
                $kontak->id_admin = $request->User()->id;
                $kontak->save();
                return redirect()->route('kontak.index')->with('success', "kontak dengan Nama <strong>$kontak->nama</strong> berhasil diubah.");
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
     * @param  \App\models\kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $kontak = Kontak::findOrFail($id);
                $kontak->id_de = $req->User()->id;
                $kontak->save();
                $kontak->delete();

                return redirect()->route('kontak.index')->with('success', "Kontak  <strong>$kontak->judul</strong> sudah dihapus (Arsip).");
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
