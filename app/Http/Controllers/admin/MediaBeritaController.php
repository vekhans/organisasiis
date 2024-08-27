<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\models\Berita;
use App\Models\models\MediaBerita;
use App\Models\User;
use Image;
class MediaBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index($media_berita)
    {
        if (Auth::User()->aturan== 'ijo'){
            $title = 'Media Berita';
            if(!$media_berita)
            {
                return redirect()->route('berita.index');
            }
            $data = MediaBerita::all()->where('id_berita','=',$media_berita);
            $media_berita = Berita::find($media_berita);
            return view('belakang.berita.media_home',['title' => $title, 'media_berita' => $media_berita,'data' => $data]);
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
    public function create($media_berita, $id=null)
    {
        if (Auth::User()->aturan== 'ijo'){         
            if(!$media_berita)
            {
                return redirect()->route('meber.index');
            }
            $title = 'Tambah Media Berita';
            $data      = MediaBerita::where('id_berita','=',$media_berita)->find($id);
            $media_berita = Berita::find($media_berita);
            $jenis  = ['foto','video'];
            return view('belakang.berita.media_form',['title' => $title, 'media_berita' => $media_berita, 'id' => $id,'data' => $data, 'jenis' => $jenis]);
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
    public function store(Request $req, $media_berita, $id = null)
    {
        if (Auth::User()->aturan== 'ijo' or  Auth::User()->aturan== 'kuning'){
            if(!$media_berita)
            {
                return redirect()->route('meber.index')->with('status','Data media tidak valid!');
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
                $dir = 'media/berita/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                } 


                $file      = $req->media;
                $filename  = $req->jenis.'mb_'.uniqid();
                $extension = $file->getClientOriginalExtension();
                 
                
                $thumbnailResize= Image::make($file->getRealPath());
                $thumbnailResize->resize(850, 480);
                $thumbnailResize->save('media/berita/'.$filename.'.'.$extension);








            }
            $media = new MediaBerita;
            $media->id_berita = $media_berita;
            $media->jenis     = $req->jenis;
            $media->caption   = $req->caption;
            $media->sumber    = $req->sumber;
            $media->file      = ($req->jenis == 'video') ? $req->link : $dir.$filename.'.'.$extension;
            $media->id_ad = $req->User()->id;
            $media->save();
            $status = "1 Data Media Berita baru telah diunggah.";
            return redirect()->route('meber.index',$media_berita)->with('status', $status);
        }
        else{
            return view('layouts.temp.hak');
        }
    }
    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\models\media_berita  $media_berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $media_berita)
    {
        if (Auth::User()->aturan== 'ijo'){
            if($req->id) {
                $media = MediaBerita::find($req->id);
                if(file_exists('./'.$media->file)){
                    $media->id_de = $req->User()->id;
                    $media->save();
                    unlink('./'.$media->file);
                }
                $media->id_de = $req->User()->id;
                $media->save();
                $media->delete();
                $status = "1 Data Media Berita telah dihapus.";
            }else{
                $status = '';
            }
            return redirect()->route('meber.index',$media_berita)->with('status', $status);
        }
        else{
            return view('layouts.temp.hak');
        }
    }
}
