@extends('layouts.temp.ednes')
@section('content')
<section class="ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <ol class="breadcrumb">
                    <div>
                        <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                        <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>PROFIL</b></a>
                    </div>
                </ol>
                <div class="mb-30 p-30 ptb-sm-25 plr-sm-15 card-view">
                    @foreach($jakObj as $rote) 
                    @if($rote->media_profil()->exists() && file_exists('./'.$rote->media_profil->first()->file))
                    <div id="kontrol" class="carousel slide" data-ride="carousel">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="carousel-inner">
                                @foreach($rote->media_profil as $media)
                                @if($media->jenis == 'foto')
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ asset($media->file) }}" alt="profil">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>{{ $media->caption }}</h3>
                                    </div>
                                </div>
                                @else
                                @endif
                                @endforeach`
                            </div>
                            <a class="carousel-control-prev" href="#kontrol" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#kontrol" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <h3 class="mt-30 mb-5"><a href="{{ route('deber',['id'=>$rote->id,'slug'=>str_slug($rote->nama)]) }}">{{ ($rote->nama)}}.</a></h3>
                    <ul class="mtb-10 list-li-mr-20 color-lite-black">
                        <li><i class="mr-5 font-12 ion-clock"></i>{{ $rote->updated_at->format('d M Y') }}</li> 
                        <li><i class="mr-5 font-12 ion-ios-telephone "></i>{{ ($rote->tlpn) }}</li>
                        <span class="iconify" data-icon="ion:ios-call" data-inline="false"></span>
                        <li><i class="mr-5 font-12 ion-email"></i>{{ ($rote->email) }}</li>
                        <li><i class="mr-5 font-12 ion-home"></i>{{ ($rote->alamat) }}</li>
                    </ul>
                    <hr>
                    <p>{!!($rote->deskripsi)!!}...
                    </p>

                    <strong>Logo :</strong>
                                    <hr>
                                    <div class="text-center">
                                        <img id="img-preview" src="{{ asset($rote->file) }}" class="img-responsive" style="" alt="foto Logo">
                                    </div>
                                    <strong>Struktur :</strong>
                                    <hr>
                                    <div class="text-center">
                                        <img id="img-preview" src="{{ asset($rote->struktur) }}" class="img-responsive" style="" alt="foto Struktur">
                                    </div>
                                    <hr>
                                    <strong>Keterangan :</strong>
                                    <p>
                                        {!! ($rote->keterangan)!!}...
                                    </p>
                    @endif
                    <a href="{{ route('pesans','#pesans')}}">#Kontak Kami</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                    @foreach($beritaObj as $berita) 
                    @endforeach
                    <div class="sided-80x mb-20">
                        <div>
                            <ul>
                                @foreach($jenisBeritaObj as $jenis)
                                @if($berita->id_jenis == $jenis->id)
                                <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }} </a></h5>
                                @else
                                <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }}</a></h5>
                                @endif
                                <hr>
                                @endforeach

                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>RATING TERTINGGI</b></h4>
                    @foreach($putryObj as $sacry)
                    @if($sacry->media_berita()->exists() && file_exists('./'.$sacry->media_berita('jenis','=','foto')->first()->file))
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset($sacry->media_berita->first()->file)}}" alt="rating">
                        </div>
                        <div class="s-right">
                            <h5><a href="{{ route('deber',['id'=>$sacry->id,'slug'=>str_slug($sacry->judul)]) }}">
                                <b>{{ ucwords($sacry->judul)}}</b></a>
                            </h5>
                            <i class="mr-5 font-12 ion-clock"></i>{{ $sacry->updated_at->format('d M Y') }}  
                            <span class="price pull-rigth">
                                @for($n=1; $n<= $sacry->rating; $n++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for($n=4; $n>= $sacry->rating; $n--)
                                <i class="fa fa-star-o"></i>
                                @endfor
                            </span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>VIDEO TERUPDATE</b></h4>
                    @foreach($vein as $nonahenuk)
                    <div class="sided-80x mb-20"> 
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($nonahenuk->file)!!}" allowfullscreen>
                            </iframe>
                        </div>
                        <h5><a href=" ">
                            <b>{{ ucwords($nonahenuk->caption)}}</b></a>
                        </h5>
                        {{ ucwords($nonahenuk->sumber)}}  
                        <span class="price pull-rigth">
                            <i class="mr-5 font-12 ion-clock"></i>
                            {{ $nonahenuk->updated_at->format('d M Y') }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> 
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    </ol>
</nav>
@endsection