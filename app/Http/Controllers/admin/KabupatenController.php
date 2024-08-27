<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Provinsi;
use App\Models\models\Kabupaten;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinsi)
    {
        if (Auth::User()->aturan== 'ijo'){
            try {
                if(!$provinsi)
            {
                return redirect()->route('provinsi.index');
            }
            $title = 'Data Kabupaten';
            $data = Kabupaten::all()->where('id_provinsi','=',$provinsi);
            $provinsi = Provinsi::find($provinsi);
            return view('belakang.kabupaten.home',['title' => $title, 'provinsi' => $provinsi,'data' => $data]);
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
    public function create($provinsi, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Tambah Data Kabupaten';
            $provinsi = Provinsi::find($provinsi);            
            return view('belakang.kabupaten.create', ['title' => $title, 'provinsi' => $provinsi]);
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
    public function store(Request $request, $provinsi, $id = null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $this->validate($request, [
                'nama' => 'required|unique:kabupatens',
            ]);
            $kabupatens = Kabupaten::create([
                'id_ad' => $request->User()->id,
                'nama' => $request->input('nama'),
                'id_provinsi' => $provinsi,
                
            ]);
            return redirect()->route('kabupaten.index',$provinsi)->with('success', "Kabupaten <strong>$kabupatens->nama</strong> sudah ditambahkan.");
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
    public function show($provinsi, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $kabupaten = Kabupaten::findOrFail($id);
                $provinsi = Provinsi::findOrFail($provinsi);
                $params = [
                    'title' => 'Hapus Kabupaten',
                    'provinsi' => $provinsi,
                    'kabupaten' => $kabupaten,
                ];
                return view('belakang.kabupaten.delete')->with($params);
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
    public function edit($provinsi, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $kabupaten = Kabupaten::findOrFail($id);
                $provinsi = Provinsi::findOrFail($provinsi);
                $params = [
                    'title' => 'Ubah Data Kabupaten',
                    'kabupaten' => $kabupaten,
                    'provinsi' => $provinsi,
                ];

                return view('belakang.kabupaten.edit')->with($params);
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
    public function update(Request $request, $provinsi, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'nama' => 'required|unique:kabupatens,nama,'.$id,
                ]);

                $kabupatens = Kabupaten::findOrFail($id);
                $kabupatens->nama = $request->input('nama');;
                $kabupatens->id_ad = $request->User()->id;
                $kabupatens->save();
                return redirect()->route('kabupaten.index',$provinsi)->with('success', "Kabupaten <strong> $kabupatens->nama</strong> berhasil diubah.");
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
    public function destroy(Request $req, $provinsi, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('kabidkec');
                $kabupatens = Kabupaten::findOrFail($id);

                $should_delete = true;
                foreach($relationships as $r) {
                    if ($kabupatens->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('kabupaten.index',$provinsi)->with('error', "Kabupaten  <strong>$kabupatens->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $kabupatens->id_de = $req->User()->id;
                    $kabupatens->save();
                    $kabupatens->delete();
                    return redirect()->route('kabupaten.index',$provinsi)->with('success', "Kabupaten  <strong>$kabupatens->nama</strong> sudah dihapus (Arsip).");
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
