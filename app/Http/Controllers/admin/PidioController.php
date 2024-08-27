<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\models\Pidio;
use App\Models\User;
class PidioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Video';
            $data = Pidio::OrderBy ('updated_at', 'desc')->get();
            return view('belakang.pidio.home',['title' => $title,'data' => $data]);
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
                'title' => 'Tambah Video',
            ];
            return view('belakang.pidio.create')->with($params);
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
                'caption' => 'required|unique:pidios',
                'file' => 'required|unique:pidios',
            ]);
            $pidios = Pidio::create([
                'id_admin' => $request->User()->id,
                'id_ad' => $request->User()->id,
                'caption' => $request->input('caption'),
                'file' => $request->input('file'),
                'sumber' => $request->input('sumber'),
            ]);
            return redirect()->route('video.index')->with('success', "Video <strong>$pidios->Caption</strong> sudah ditambahkan.");
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Pidio  $pidio
     * @return \Illuminate\Http\Response
     */ 
    public function show(Pidio $Pidio, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $pidios = Pidio::findOrFail($id);
                $params = [
                    'title' => 'Hapus Video',
                    'pidios' => $pidios,
                ];
                return view('belakang.pidio.delete')->with($params);
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
     * @param  \App\models\Pidio  $pidio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $pidios = Pidio::findOrFail($id);
                $params = [
                    'title' => 'Ubah Video',
                    'pidios' => $pidios,
                ];
                return view('belakang.pidio.edit')->with($params);
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
     * @param  \App\models\Pidio  $pidio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'caption' => 'required|unique:pidios,caption,'.$id,
                    'file' => 'required|unique:pidios,file,'.$id,
                ]);
                $pidios = Pidio::findOrFail($id);
                $pidios->id_admin = $request->User()->id;
                $pidios->caption = $request->input('caption');
                $pidios->file = $request->input('file'); 
                $pidios->sumber = $request->input('sumber');
                $pidios->save();
                return redirect()->route('video.index')->with('success', "Video <strong>$pidios->Caption</strong> berhasil diubah..");
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
     * @param  \App\models\Pidio  $pidio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $pidios = Pidio::findOrFail($id);
                $pidios->id_de = $req->User()->id;
                $pidios->save();
                $pidios->delete();
                return redirect()->route('video.index')->with('success', "Video  <strong>$pidios->caption</strong> sudah dihapus (Arsip).");
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
                $berita = Pidio::findOrFail($id);
                $berita->id_publish = $request->User()->id;
                $berita->publish_at  = DB::raw('CURRENT_TIMESTAMP');
                $berita->publish  = 'publish';
                $berita->ok  = 1;
                $berita->save();
                return redirect()->route('video.index')->with('success', "Video dengan caption <strong>$berita->caption</strong> berhasil di PUBLIKASI."); 
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
                $berita = Pidio::findOrFail($id);
                $berita->id_admin = $request->User()->id;
                $berita->publish_at  = DB::raw('CURRENT_TIMESTAMP');
                $berita->publish  = 'belum';
                $berita->ok  = 0;
                $berita->save();
                return redirect()->route('video.index')->with('warning', "Video dengan caption <strong>$berita->caption</strong> berhasil ditarik dari Publik.!!!");
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
