<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\models\Slide;
use Image;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        if (Auth::User()->aturan== 'ijo'){
            $title ='Data Slide';
            $data = Slide::OrderBy ('updated_at', 'desc')->get();
            return view('belakang.slide.home',['title' => $title, 'data' => $data]);
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
            $title = 'Tambah Slide';
            return view('belakang.slide.create',['title' => $title,]  );
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
    public function store(Request $req, $id = null)
    {
        if (Auth::User()->aturan== 'ijo' or  Auth::User()->aturan== 'kuning'){
            $this->validate($req, [
                'media'   => 'required|file|image',
                'caption' => 'required',
            ]);
            if ($req->hasFile('media')) {
                $dir = 'media/slide/';
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
                $file      = $req->media;
                $filename  = uniqid('slide_');
                $extension = $file->getClientOriginalExtension();

                $thumbnailResize= Image::make($file->getRealPath());
                $thumbnailResize->resize(850, 480);
                $thumbnailResize->save('media/slide/'.$filename.'.'.$extension);
                




                $media = new Slide;
                $media->id_admin = $req->user()->id;
                $media->caption  = $req->caption;
                $media->sumber  = $req->sumber;
                $media->file     = $dir.$filename.'.'.$extension;
                // $media->status   = $req->status;
                $media->status   = 1;
                $media->save();
                $status = "1 Data Slideshow baru telah diunggah.";
            }
            return redirect()->route('slide.index')->with('status', $status);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if (Auth::User()->aturan== 'ijo'){
            if($req->id) {
                $slides = Slide::find($req->id);
                if(file_exists('./'.$slides->file)){
                    $slides->id_de = $req->User()->id;
                    $slides->save();
                    unlink('./'.$slides->file);
                }
                $slides->id_de = $req->User()->id;
                $slides->save();
                $slides->delete();
                $status = "1 Data Slide telah dihapus.";
            }else{
                $status = '';
            }
            return redirect()->route('slide.index')->with('status', $status);
        }
        else{
            return view('layouts.temp.hak');
        }
    }
}
