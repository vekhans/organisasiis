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


class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinsi, $kabupaten )
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
                    $title = 'Data Kecamatan';
                    $data = Kecamatan::all()->where('id_kabupaten','=',$kabupaten);
                    $provinsi = Provinsi::find($provinsi);
                    $kabupaten = Kabupaten::find($kabupaten);
                    return view('belakang.kecamatan.home',['title' => $title, 'provinsi' => $provinsi, 'kabupaten' => $kabupaten, 'data' => $data]);
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
    public function create($provinsi,$kabupaten, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Tambah Data Kecamatan';
            $kabupaten = Kabupaten::find($kabupaten);
            $provinsi = Provinsi::find($provinsi);
            return view('belakang.kecamatan.create', ['title' => $title, 'provinsi' => $provinsi,'kabupaten' => $kabupaten]);
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
    public function store(Request $request, $provinsi, $kabupaten, $id = null)
    {
        if (Auth::User()->aturan== 'ijo'){
            $this->validate($request, [
                'nama' => 'required|unique:kecamatans',
            ]); 
            $kecamatans = Kecamatan::create([
                'id_ad' => $request->User()->id,
                'nama' => $request->input('nama'),
                'id_kabupaten' => $kabupaten,
                
            ]);
            return redirect()->route('kecamatan.index',[$provinsi, $kabupaten])->with('success', "Kecamatan <strong>$kecamatans->nama</strong> sudah ditambahkan.");
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
    public function show($provinsi, $kabupaten, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $provinsi = Provinsi::findOrFail($provinsi);
                $kabupaten = Kabupaten::findOrFail($kabupaten);
                $kecamatan = Kecamatan::findOrFail($id);
                $params = [
                    'title' => 'Hapus Kecamatan',
                    'provinsi' => $provinsi,
                    'kabupaten' => $kabupaten,
                    'kecamatan' => $kecamatan,

                ];
                return view('belakang.kecamatan.delete',[$provinsi, $kabupaten])->with($params);
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
     public function edit($provinsi, $kabupaten, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $kecamatan = Kecamatan::findOrFail($id);
                $provinsi = Provinsi::findOrFail($provinsi);
                $kabupaten = Kabupaten::findOrFail($kabupaten);
                $params = [
                    'title' => 'Ubah Data Kecamatan',
                    'kecamatan' => $kecamatan,
                    'kabupaten' => $kabupaten,
                    'provinsi' => $provinsi,

                ];

                return view('belakang.kecamatan.edit',[$provinsi, $kabupaten])->with($params);
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
    public function update(Request $request, $provinsi, $kabupaten, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'nama' => 'required|unique:kecamatans,nama,'.$id,
                ]);

                $kecamatans = Kecamatan::findOrFail($id);
                $kecamatans->nama = $request->input('nama');;
                $kecamatans->id_ad = $request->User()->id;
                $kecamatans->save();
                return redirect()->route('kecamatan.index',[$provinsi, $kabupaten])->with('success', "Kecamatan <strong> $kecamatans->nama</strong> berhasil diubah.");
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
    public function destroy(Request $req, $provinsi, $kabupaten, $id)
    {
        if (Auth::User()->aturan== 'ijo'){

            try
            {
                $relationships = array('keciddesa');
                $kecamatans = Kecamatan::findOrFail($id);

                $should_delete = true;
                foreach($relationships as $r) {
                    if ($kecamatans->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('kecamatan.index',[$provinsi, $kabupaten])->with('error', "Kecamatan  <strong>$kecamatans->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lain.");
                    }
                }
                if ($should_delete == true) {
                    $kecamatans->id_de = $req->User()->id;
                    $kecamatans->save();
                    $kecamatans->delete();
                    return redirect()->route('kecamatan.index',[$provinsi, $kabupaten])->with('success', "Kecamatan  <strong>$kecamatans->nama</strong> sudah dihapus (Arsip).");
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
