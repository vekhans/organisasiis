<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\models\JenisArsip;
use Illuminate\Support\Facades\DB;
class JenisArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Jenis Arsip'; 
            $data = JenisArsip::OrderBy ('updated_at', 'desc')->get();
            return view('belakang.jenisarsip.home',['title' => $title, 'data' => $data]);
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
                'title' => 'Tambah Jenis Arsip',
            ];
            return view('belakang.jenisarsip.create')->with($params);
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
                'jenis' => 'required|unique:jenis_arsips',
            ]);
            $jenisarsips = JenisArsip::create([
                'id_admin' => $request->User()->id,
                'id_ad' => $request->User()->id,
                'jenis' => $request->input('jenis'),
            ]);
            return redirect()->route('jenisarsip.index')->with('success', "Jenis Arsip <strong>$jenisarsips->jenis</strong> sudah ditambahkan.");
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Jenis_Arsip  $jenis_Arsip
     * @return \Illuminate\Http\Response
     */
    public function show(JenisArsip $JenisArsip, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try{
                $jenisarsips = JenisArsip::findOrFail($id);

                $params = [
                    'title' => 'Hapus Jenis Arsip',
                    'jenisarsips' => $jenisarsips,
                ];

                return view('belakang.jenisarsip.delete')->with($params);
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
     * @param  \App\models\Jenis_Arsip  $jenis_Arsip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $jenisarsips = JenisArsip::findOrFail($id);

                $params = [
                    'title' => 'Ubah Jenis Arsip',
                    'jenisarsips' => $jenisarsips,
                ];

                return view('belakang.jenisarsip.edit')->with($params);
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
     * @param  \App\models\Jenis_Arsip  $jenis_Arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {
                $this->validate($request, [
                    'jenis' => 'required|unique:jenis_arsips,jenis,'.$id,
                ]);
                $jenisarsips = JenisArsip::findOrFail($id);
                $jenisarsips->jenis = $request->input('jenis');
                $jenisarsips->id_admin = $request->User()->id;
                $jenisarsips->save();
                return redirect()->route('jenisarsip.index')->with('success', "Jenis Arsip <strong>$jenisarsips->jenis</strong> berhasil diubah.");
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
     * @param  \App\models\Jenis_Arsip  $jenis_Arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        if (Auth::User()->aturan== 'ijo'){
            try
            {

                $relationships = array('jenis_arsip');
                $jenis_arsips = JenisArsip::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($jenis_arsips->$r->isNotEmpty()) {
                        $should_delete = false;
                        return redirect()->route('jenisarsip.index')->with('error', "Jenis Arsip <strong>$jenis_arsips->jenis</strong> tidak bisa dihapus karna sudah dipakai pada data arsip.");
                    }
                }
                if ($should_delete == true) {
                    $jenis_arsips->id_de = $req->User()->id;
                    $jenis_arsips->save();
                    $jenis_arsips->delete();
                    return redirect()->route('jenisarsip.index')->with('success', "Jenis Arsip <strong>$jenis_arsips->jenis</strong> sudah dihapus (Arsip).");
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
