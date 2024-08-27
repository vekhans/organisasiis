<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baca Detail Berita</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /**
        Set the margins of the page to 0, so the footer and the header
        can be of the full height and width !
        **/
        @page {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0cm 0cm;
        }
        /** Define now the real margins of every page in the PDF **/
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-top: 3cm;
            margin-left: 3cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        /** Define the header rules **/
        header {
            position: fixed;
            top: 0.6cm;
            left: 3cm;
            right: 2cm;
            height: 2cm;
        }
        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0.6cm; 
            left: 3cm; 
            right: 2cm;
            height: 1cm;
        }
    </style>  
</head>
<body>
    <header>
        <img src="media/veky.png" alt="Rating berita desa" width="100%" height="100%"/>
        <!-- <img src="header.png" width="100%" height="100%"/> -->
    </header>
    <footer>
         <img src="media/veky.png" alt="Rating berita desa" width="100%" height="100%"/>
    </footer>
    <h3 style="text-align:center">
        <a href=""><b>{{ ucwords($berita->judul)}}</b></a>
    </h3>
    <p>Waktu Upload     : <i class=""></i> {{ $berita->created_at}} </p> 
    <p>Nama Penulis     : <i class=""></i> {{ ucwords($berita->admin->name) }} </p> 
    <p>Jumlah Komentar  : <i class=""></i> {{($berita->comment_count)}} - Jumlah Kunjungan :<i class=""></i> {{($berita->visit_count)}} </p> 
    Rating : <span class="">
        @for($n=1; $n<= $berita->rating; $n++)
        <i class="fa fa-star" style="color: #f0FF">$n</i>
        @endfor
        @for($n=4; $n>= $berita->rating; $n--)
        <i class="fa fa-star-o">$n</i>
        @endfor
    </span>
    <br>
    <span class="price">
    Status Publish : <strong>{{ucwords($berita->publish)}}</strong>     
    </span>
    <hr>
    {!!($berita->deskripsi)!!}...
    <hr>
    <h4><b>Pesan / Komentar</b></h4>
    <hr>
        @if($berita->komentar()->exists())
        <ol >
            @foreach($berita->komentar as $komentar)
            <ul id="komentarberita-{{$komentar->id}}">
                <div>
                    <div >
                        <img class="avatar" src="{{ $komentar->gravatar }}" alt="icon gravatar komentar berita">
                    </div>
                    <div class="color-red"> 
                        <span >
                            <h5><b>{{$komentar->nama}}</b><span class="font-8"> / {{ $komentar->created_at->diffForHumans() }}</span></h5>
                            <span class="star">
                                @for($n=1; $n<= $komentar->rating; $n++)
                                <i class="fa fa-star" style="color: #f0FF">b</i>
                                @endfor
                                @for($n=4; $n>= $komentar->rating; $n--)
                                <i class="fa fa-star-o">b</i>
                                @endfor
                            </span>
                        </span>
                        <p>{{$komentar->komentar}}</p>
                        <span><a href="#balas-{{$komentar->id}}" class="balaskomentar" data-id="{{$komentar->id}}"><i class="fa fa-reply"></i> Balas</a></span>
                    </div>
                </div>
                <div id="formbalas-{{$komentar->id}}"></div>
                <div class="">
                    @if($komentar->balasan()->exists())
                    @foreach($komentar->balasan as $balasan)
                    <div class="">
                        <div class="img-thumbnail s-left br-3 oflow-hidden">
                            <img class="avatar" alt="gavatar komentator" src="{{ $balasan->gravatar }}">
                        </div>
                        <div  class="">
                            <h5><b>{{$balasan->nama}}</b><span class="ml-3 color-ash font-8"> / {{ $balasan->created_at->diffForHumans() }}</span></h5>
                            <p class="">{{$balasan->komentar}}
                            </p> 
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class=""></div>
                </div>
            </ul>
            @endforeach
        </ol>
        @else
        <div>
            <h5> <strong>Berita ini belum memiliki komentar </strong>
            </h5>
        </div>
        @endif
    <hr>
    <h4><b>Foto</b></h4>
    <hr>
    @if($berita->media_berita()->exists() && file_exists('./'.$berita->media_berita->first()->file))                              
    <div>
        @foreach($berita->media_berita as $media)
        @if($media->jenis == 'foto')
        <img  src="{{ $media->file}}" alt="foto berita" width="100%" height="100%">
        <div>
            <div style="text-align: center;">
                <span style="color: #f0FF; font-family: Verdana,Arial,Helvetica; font-size: 14px;">{{ucwords ($media->caption)}}</span>
            </div>
        </div>
        <br>
        ---
        @else
        =========
    @endif
    @endforeach
    </div>
    @else
        <div>
            <h5> <strong>Berita ini belum memiliki Foto </strong>
            </h5>
        </div>
    @endif    
</body> 
</html>
 