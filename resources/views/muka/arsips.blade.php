@extends('layouts.temp.ednes')
@section('content')
<section class="ptb-30">
	<div class="container">
		<div class="row">
            <div class="col-md-12 col-lg-8">
                <ol class="breadcrumb">
                    <div>
                        <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                        <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>ARSIP</b></a>
                    </div>
                </ol>                 
                <div class="p-30 mb-30 card-view">
                    @foreach($arsipObj as $arsipan)
                    <div class="mb-30 sided-250x s-lg-height card-view">
                        <div class="s-left">
                            <img src="{{ asset('media/veky.png')}}" alt="berita veky" style="width: 70%">
                        </div> 
                        <div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
                            <h4><a href="{{ route('arsips',['id'=>$arsipan->id,'slug'=>str_slug($arsipan->judul)]) }}">{{ ucwords($arsipan->judul)}} </a>
                            </h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{ $arsipan->created_at->format('d M Y') }}</li>
                                <li><i class="mr-5 font-12 ion-document"></i>
                                    {{ucwords($arsipan->jenis_arsip->jenis)}}
                                </li>
                                <li>
                                    <strong>
                                        <a href="{{ url($arsipan->file)}}" download> <i class="mr-5 font-12 ion-android-download"></i> Unduh File</a>
                                    </strong>
                                </li>
                            </ul>
                            
                            <p class="mt-10">{!!substr(strip_tags($arsipan->deskripsi),0,100 )!!}...
                            </p>
                        </div>                
                    </div>
                    @endforeach
                    <div style="text-align: center;">
                        {{ $arsipObj->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI ARSIP</b></h4>
                    <div class="sided-80x mb-20">
                        <div >
                            <ul>
                                @foreach($jenisArsipObj as $jenis)
                                <h5><a href="{{ route('arsipall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ ucwords($jenis->jenis) }} </a></h5>
                                <hr>
                                @endforeach
                            </ul>
                        </div> 
                    </div><!-- sided-80x -->
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
                    <h4 class="p-title"><b>RATING TERTINGGI</b></h4>
                    @foreach($putryObj as $sacry)
                    <div class="sided-80x mb-20">
                        @if($sacry->media_berita()->exists() && file_exists('./'.$sacry->media_berita('jenis','=','foto')->first()->file))
                        <div class="s-left">
                            <img src="{{ asset($sacry->media_berita->first()->file)}}" alt="Rating berita veky">
                        </div>
                        @else
                        <div class="s-left">
                            <img src="{{ asset('media/veky.png')}}" alt="Rating berita veky">
                        </div>
                        @endif
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
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</section>
<section class="ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title"><b>BERITA TERUPDATE</b></h4>
                    <div class="row">
                        @foreach($rockyObj as $rocky)
                        <div class="col-sm-4 mb-sm-20">
                            @if($rocky->media_berita()->exists() && file_exists('./'.$rocky->media_berita('jenis','=','foto')->first()->file))
                            <div class="s-left">
                                <img src="{{ asset($rocky->media_berita->first()->file)}}" alt="berita veky">
                            </div>  
                            @else
                            <div class="s-left">
                                <img src="{{ asset('media/veky.png')}}" alt="berita veky">
                            </div>
                            @endif
                            <h5 class="mt-20"><a href="{{ route('deber',['id'=>$rocky->id,'slug'=>str_slug($rocky->judul)]) }}">
                                <b>{{ ucwords($rocky->judul)}}</b></a>
                            </h5>
                            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{ ucwords($rocky->publish_at)}}</li>
                            </ul>
                            <p class="mt-10">{!!substr(strip_tags($rocky->deskripsi),0,100 )!!}...
                            </p>
                        </div><!-- col-sm-4 -->
                        @endforeach
                    </div><!-- row -->
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        <ul>
                            @foreach($jenisBeritaObj as $jenis)
                            <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ ucwords($jenis->jenis) }} </a></h5>
                            <hr>
                            @endforeach
                        </ul>
                    </div><!-- sided-80x -->
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
            </div>
        </div>
    </div>
</section>
@stop


