<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\models\Profil;
use App\Models\models\MediaProfil;
use App\Models\User;
use Image;
class MediaProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index($media_profil)
    {
        if (Auth::User()->aturan== 'ijo'){
            try {
                if(!$media_profil)
            {
                return redirect()->route('profil.index');
            }
            $title = 'Media Profil';
            $data = MediaProfil::all()->where('id_profil','=',$media_profil);
            $media_profil = Profil::find($media_profil);
            return view('belakang.profil.media_home',['title' => $title, 'media_profil' => $media_profil,'data' => $data]);
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
    public function create($media_profil, $id=null)
    {         
        if (Auth::User()->aturan== 'ijo'){
            try {
                if(!$media_profil)
            {
                return redirect()->route('mepro.index');
            }
            $title ='Tambah Media Profil';
            $data      = MediaProfil::where('id_profil','=',$media_profil)->find($id);
            $media_profil = Profil::find($media_profil);
            $jenis  = ['foto','video'];
            return view('belakang.profil.media_form',['title'=>$title, 'media_profil' => $media_profil, 'id' => $id, 'data' => $data, 'jenis' => $jenis]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $media_profil, $id = null)
    {
        if (Auth::User()->aturan== 'ijo'){
            try {
                if(!$media_profil)
                {
                    return redirect()->route('mepro.index')->with('status','Data media tidak valid!');
                }
                $validasi['jenis'] = 'required';
                if($req->jenis == 'video') {
                    $validasi['link'] = 'required';
                }else {
                    $validasi['media'] = 'required|file'.($req->jenis == 'foto' ? '|image' : '');
                }
                $validasi['caption'] = 'required';
                $this->validate($req,$validasi);
                if ($req->hasFile('media')) {
                    $dir = 'media/profil/';
                    if(!file_exists($dir)){
                        mkdir($dir, 0777, true);
                    }
                    $file      = $req->media;
                    $filename  = 'mp_'.uniqid();               
                    $extension = $file->getClientOriginalExtension();

                    $thumbnailResize= Image::make($file->getRealPath());
                    $thumbnailResize->resize(850, 480);
                    $thumbnailResize->save('media/profil/'.$filename.'.'.$extension);
                }
                $media = new MediaProfil;
                $media->id_profil = $media_profil;
                $media->jenis     = $req->jenis;
                $media->sumber     = $req->sumber;
                $media->caption   = $req->caption;
                $media->file      = ($req->jenis == 'video') ? $req->link : $dir.$filename.'.'.$extension;
                $media->id_ad = $req->User()->id;
                $media->save();
                $status = "1 Data Media Profil baru telah diunggah.";
                return redirect()->route('mepro.index',$media_profil)->with('status', $status);
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
    public function destroy(Request $request, $media_profil)
    {
        if (Auth::User()->aturan== 'ijo'){
            try {
                if($request->id) {
                    $media = MediaProfil::find($request->id);
                    if(file_exists('./'.$media->file)){
                        $media->id_de = $request->User()->id;
                        $media->save();
                        unlink('./'.$media->file);
                    }
                    $media->id_de = $request->User()->id;
                    $media->save();
                    $media->delete();

                    $status = "1 Data Media Profil telah dihapus.";
                }else{
                    $status = 'data tidak valid';
                }
                return redirect()->route('mepro.index',$media_profil)->with('status', $status);
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
