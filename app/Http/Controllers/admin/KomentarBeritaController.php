<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\models\Berita;
use App\Models\models\KomentarBerita;
use Illuminate\Support\Facades\DB;

class KomentarBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index($berita)
    {
        if (Auth::User()->aturan== 'ijo' ){
            if(!$berita)
            {
                return redirect()->route('berita.index');
            }
            $title ='Komentar Berita';
            $data = KomentarBerita::all()->where('id_berita','=',$berita);
            $berita = Berita::find($berita);
            return view('belakang.komentar.home',['title' => $title, 'berita' => $berita,'data' => $data]);
        }
        else{
            return view('layouts.temp.hak');
        }
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\komentar_berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($berita, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                if(!$berita)
                {
                    return redirect()->route('berita.index');
                }
                $title = 'Ubah Komentar Berita'; 
                $komentar = KomentarBerita::findOrFail($id);
                $berita = Berita::find($berita);
                return view('belakang.komentar.edit',['title' => $title, 'berita' => $berita, 'id' => $id, 'komentar' => $komentar]);             
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
     * @param  \App\models\komentar_berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $berita, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                'nama'  => 'required',
                'email'  => 'required',
                'komentar'  => 'required', 
                ]);
                $komentar = KomentarBerita::findOrFail($id);
                $komentar->nama = $request->nama;
                $komentar->email = $request->email;
                $komentar->komentar = $request->komentar;
                $komentar->save();
                return redirect()->route('komentar.index',$berita)->with('success', "Komentar Berita <strong>$komentar->nama</strong> berhasil diubah.");
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
     * @param  \App\models\komentar_berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $berita)
    {
        if (Auth::User()->aturan== 'ijo'){
            $komentar = KomentarBerita::find($req->id);
            $komentar->delete();
            $berita = Berita::find($berita);
            $berita->rating = ceil($berita->komentar->avg('rating'));
            $berita->decrement('comment_count');
            $berita->save();
            $status = "1 Data Komentar Berita telah dihapus.";
            return redirect()->route('komentar.index',$berita)->with('status', $status);
        }
        else{
            return view('layouts.temp.hak');
        }
    }
}
