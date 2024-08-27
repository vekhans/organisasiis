@extends('layouts.temp.ednes')
@section('content')
<section class="ptb-30">
    <div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
                <ul class="breadcrumb">
                    <div>
                        <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                        <a href="{{ route('arsipall') }}"><i class="mlr-10 ion-chevron-right"></i><b>ARSIP</b></a>
                        <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>{{ ucwords($arsip->judul)}}</b></a>
                    </div>
                </ul>
                @if(session('status'))
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('status')}}</strong>
                </div>
                @endif
                <div class="alert alert-warning text-center" role="alert">
                    <button type="button"  data-dismiss="alert"  ><span aria-hidden="true"></span></button>
                    <strong>  STATUS PUBLISH = {{ucwords($arsip->publish)}} </strong>
                    <br>
                    <hr>
                    @if($arsip->publish == 'publish')
                    <form method="post" action="{{ route('unpublishit', $arsip->id) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $arsip->id }}">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="PUT">
                            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-eye" title="Tarik"></i> Tarik dari Publik</button>
                            <a href="{{route('arsip.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                    @else
                    <form method="post" action="{{ route('publishit', $arsip->id) }}" data-parsley-validate >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $arsip->id }}"> 
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="PUT">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-eye" title="Publish"></i> Publish sekarang</button>
                        <a href="{{route('arsip.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </form>
                    @endif
                </div>
                <div class="p-30 mb-30 card-view">
                    <ul class="breadcrumb" style="background-color: #eeeeee;">
                        <h3 class="mt-30 mb-5"><a href=""><b>{{ ucwords($arsip->judul)}}</b></a></h3>
                        <ul class="list-li-mr-10 color-lite-black">
                            <li><i class="mr-5 font-12 ion-clock"></i>{{ $arsip->created_at->diffForHumans() }}</li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>{{ ucwords($arsip->admin->name) }}</li>
                        </ul>
                    </ul> 
                    <p class="mt-30">
                        {!!($arsip->deskripsi)!!}
                    </p>
                    <div class="text-center">
                        <a href="{{ url($arsip->file)}}" class="btn btn-sm btn-primary" download> <i class="mr-5 font-12 ion-android-download"></i> Unduh File</a>
                    </div> 
                </div>
                <div class="p-30 mb-30 card-view"> 
                    <div class="row">
                        <h4 class="p-title"><b>BERITA TERBARU</b></h4>
                        @foreach($sberitaObj as $beritasteerbart)
                        <div class="mb-30 sided-250x s-lg-height card-view">
                            @if($beritasteerbart->media_berita()->exists() && file_exists('./'.$beritasteerbart->media_berita->first()->file))
                            <div class="s-left">
                                <img src="{{ asset($beritasteerbart->media_berita->first()->file)}}" alt="berita desa">
                            </div> 
                            @else
                            <div class="s-left">
                                <img src="{{ asset('media/veky.png')}}" alt="berita desa">
                            </div>
                            @endif
                            <div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
                                <h4><a href="{{ route('deber',['id'=>$beritasteerbart->id,'slug'=>str_slug($beritasteerbart->judul)]) }}">{{ ucwords($beritasteerbart->judul)}} </a>
                                </h4>
                                <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                    <li><i class="mr-5 font-12 ion-clock"></i>{{ $beritasteerbart->created_at->format('d M Y') }}</li>
                                    <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>
                                        {{($beritasteerbart->comment_count)}}
                                    </li>
                                    <li><i class="mr-5 font-12 ion-eye"></i>
                                        {{($beritasteerbart->visit_count)}}
                                    </li>
                                </ul>
                                <span class="price">
                                    @for($n=1; $n<= $beritasteerbart->rating; $n++)
                                    <i class="fa fa-star"></i>
                                    @endfor
                                    @for($n=4; $n>= $beritasteerbart->rating; $n--)
                                    <i class="fa fa-star-o"></i>
                                    @endfor
                                </span> 
                                <p class="mt-10">{!!substr(strip_tags($beritasteerbart->deskripsi),0,100 )!!}...
                                </p>
                            </div>                
                        </div>
                        @endforeach
                    </div>
                </div><!-- row -->
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI ARSIP</b></h4>
                    <div class="sided-80x mb-20">
                        <ul>
                            @foreach($jenisArsipObj as $jenis)
                            @if($arsip->id_jenis == $jenis->id)
                            <h5><a href="{{ route('arsipall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }} </a></h5>
                            @else
                            <h5><a href="{{ route('arsipall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }}</a></h5>
                            @endif
                            <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>BERITA TERUPDATE</b></h4>
                    @foreach($berupdateObj as $henuk)
                    @if($henuk->media_berita()->exists() && file_exists('./'.$henuk->media_berita('jenis','=','foto')->first()->file))
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset($henuk->media_berita->first()->file)}}" alt="Rating berita desa">
                        </div>
                        <div class="s-right">
                            <h5>
                                <a href="{{ route('deber',['id'=>$henuk->id,'slug'=>str_slug($henuk->judul)]) }}">
                                <b>{{ ucwords($henuk->judul)}}</b></a>
                            </h5>
                            <i class="mr-5 font-12 ion-clock"></i>{{ $henuk->updated_at->format('d M Y') }}  
                            <span class="price pull-rigth">
                                @for($n=1; $n<= $henuk->rating; $n++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for($n=4; $n>= $henuk->rating; $n--)
                                <i class="fa fa-star-o"></i>
                                @endfor
                            </span>
                        </div>
                    </div>
                    @else
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset('media/veky.png')}}" alt="Rating berita desa">
                        </div>
                        <div class="s-right">
                            <h5>
                                <a href="{{ route('deber',['id'=>$henuk->id,'slug'=>str_slug($henuk->judul)]) }}">
                                <b>{{ ucwords($henuk->judul)}}</b></a>
                            </h5>
                            <i class="mr-5 font-12 ion-clock"></i>{{ $henuk->updated_at->format('d M Y') }}  
                            <span class="price pull-rigth">
                                @for($n=1; $n<= $henuk->rating; $n++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for($n=4; $n>= $henuk->rating; $n--)
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
                    @foreach($siIga as $pedo)
                    <div class="sided-80x mb-20"> 
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($pedo->file)!!}" allowfullscreen>
                            </iframe>
                        </div>
                        <h5><a href=" ">
                            <b>{{ ucwords($pedo->caption)}}</b></a>
                        </h5>
                        {{ ucwords($pedo->sumber)}}  
                        <span class="price pull-rigth">
                            <i class="mr-5 font-12 ion-clock"></i>
                            {{ $pedo->updated_at->format('d M Y') }}
                        </span>
                    </div>
                    @endforeach
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        <ul>
                            @foreach($jenisBeritaObj as $jenis)
                            <h5>
                                <a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }}</a>
                            </h5>
                            <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>
@endsection 