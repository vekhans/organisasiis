@extends('layouts.temp.ednes')
@section('content')
<section  id="best-features" class="pt-2 bg-primary text-center">
    <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
        <div class="row d-flex justify-content-center mb-4">
            <div class="carousel-inner z-depth-1-half" role="listbox">
                @foreach( $slideObj as $kavq )
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block img-fluid" src="{{ asset($kavq->file) }}" alt="{{ $kavq->caption }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $kavq->caption }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="mb-30 p-30 ptb-sm-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b><STRONG> BERITA </STRONG>Update</b></h4>
                    @foreach($nonaObj as $igahanas)
                    @if($igahanas->media_berita()->exists() && file_exists('./'.$igahanas->media_berita('jenis','=','foto')->first()->file))
                    <img id="img-preview" class="img-responsive d-block img-fluid" src="{{ asset($igahanas->media_berita->first()->file)}}" alt="carousel-caption">
                    @else 
                    <img id="img-preview" class="img-responsive d-block img-fluid" src="{{ asset('media/veky.png')}}" alt="Berita Terupdate">
                    @endif
                    <hr>
                    <h3 class="mt-30"><a href="{{ route('deber',['id'=>$igahanas->id,'slug'=>str_slug($igahanas->judul)]) }}">{{ ucwords($igahanas->judul)}}.</a></h3>
                    <ul class="mtb-10 list-li-mr-20 color-lite-black">
                        <li><i class="mr-5 font-12 ion-clock"></i>{{ $igahanas->updated_at->format('d M Y') }}</li>
                        <li><i class="mr-5 font-12 ion-android-person"></i>{{ ucwords($igahanas->admina->name) }}</li>
                        <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>
                            {{($igahanas->comment_count)}}
                        </li>
                        <li><i class="mr-5 font-12 ion-eye"></i>
                            {{($igahanas->visit_count)}}
                        </li>
                    </ul>
                    <p>{!!substr(strip_tags($igahanas->deskripsi),0,100)!!}...
                    </p>
                    @endforeach
                </div><!-- bg-white -->
                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title"><b>BERITA TERBARU</b></h4>
                    @foreach($beritaObj as $berita)
                    <div class="mb-30 sided-250x s-lg-height card-view">
                        @if($berita->media_berita()->exists() && file_exists('./'.$berita->media_berita('jenis','=','foto')->first()->file))
                        <div class="s-left">
                            <img src="{{ asset($berita->media_berita->first()->file)}}" alt="berita desa">
                        </div><!-- left-area --> 
                        @else
                        <div class="s-left">
                            <img src="{{ asset('media/veky.png')}}" alt="berita desa">
                        </div>
                        @endif
                        <div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
                            <h4><a href="{{ route('deber',['id'=>$berita->id,'slug'=>str_slug($berita->judul)]) }}">{{ ucwords($berita->judul)}} </a>
                            </h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{ $berita->created_at->format('d M Y') }}</li>
                                <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>
                                    {{($berita->comment_count)}}
                                </li>
                                <li><i class="mr-5 font-12 ion-eye"></i>
                                    {{($berita->visit_count)}}
                                </li>
                                <span class="price">
                                    @for($n=1; $n<= $berita->rating; $n++)
                                    <i class="fa fa-star"></i>
                                    @endfor
                                    @for($n=4; $n>= $berita->rating; $n--)
                                    <i class="fa fa-star-o"></i>
                                    @endfor
                                </span>
                                <li> 
                                    <i class="mr-5 font-12 ion-android-person"></i> {{($berita->admina->name)}}
                                </li>
                                <fb:share-button href="http://www.desa.com" type="button_count" width="200" show_faces="yes"></fb:share-button>
                                <p class="mt-10">{!!substr(strip_tags($berita->deskripsi),0,100 )!!}...
                                </p>
                        </ul>
                        </div>                
                    </div>
                    @endforeach
                    <div style="text-align: center;">
                        {{ $beritaObj->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        <ul>
                            @foreach($jenisBeritaObj as $jenis)
                            @foreach($nonaObj as $kami)
                            @if($kami->id_jenis == $jenis->id)
                            <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }} </a></h5>
                            @else
                            <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }}</a></h5>
                            @endif
                            <hr>
                            @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>VIDEO TERUPDATE</b></h4>
                    @foreach($sidio as $pedo)
                    <div class="sided-80x mb-20"> 
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($pedo->file)!!}" allowfullscreen>
                            </iframe>
                        </div>
                        <h5><a href=" ">
                            <b>{{ ucwords($pedo->caption)}}</b></a>
                        </h5> 
                        <span class="price pull-rigth">
                            <i class="mr-5 font-12 ion-clock"></i>
                            {{ $pedo->updated_at->format('d M Y') }} -
                        </span>
                        {{ ucwords($pedo->sumber)}} 
                    </div>
                    @endforeach
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>RATING TERTINGGI</b></h4>
                    @foreach($sacObj as $sacry)
                    <div class="sided-80x mb-20">
                        @if($sacry->media_berita()->exists() && file_exists('./'.$sacry->media_berita('jenis','=','foto')->first()->file))
                        <div class="s-left">
                            <img src="{{ asset($sacry->media_berita->first()->file)}}" alt="rating">
                        </div>
                        @else
                        <div class="s-left">
                            <img src="{{ asset('media/veky.png')}}" alt="rating">
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
                <!-- <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>TENTANG PENULIS</b></h4>
                    <div class="sided-90x mb-20">
                        <div class="s-left br-3 oflow-hidden">
                            <img src="{{asset('ednews/images/sidebar-profile-1-100x100.jpg')}}" alt="penulis">
                        </div>
                        <div class="s-right">
                            <h4 class="pt-20"><b>Jon Doe</b></h4>
                            <h6 class="color-ash">Reporter</h6>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<section class="bg-dark-primary pos-relative pb-20">
    <div class="container">
        <h4 class="color-lite-black p-title in"><b>VIDEO TERBARU</b></h4>
        <div class="row">
            @foreach($pidio as $nonton)
            <div class="col-sm-6 col-md-3">
                <a class="hover-grey dplay-block" target="_blank" style="color: #ffffff">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($nonton->file)!!}" allowfullscreen>
                        </iframe>
                    </div>
                    <h5 class="mt-15"><b>{{ $nonton->caption }}</b></h5>
                </a>
                <ul class="mt-5 mb-30 list-li-mr-20 color-lite-black">
                    <li><i class="mr-5 font-12 ion-clock"></i>{{ $nonton->updated_at }}</li>
                </ul>
            </div><!-- col-md-3 -->
            @endforeach
            
        </div><!-- row -->
        <div style="text-align: center;">
                {{$pidio->links()}}
            </div>
    </div>
</section>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb"></ol>
</nav> 
 

@endsection
 