@extends('layouts.temp.ednes')
@section('content')
<section class="ptb-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
                <ol class="breadcrumb">
                        <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                        <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>VIDEO</b></a>
                </ol>                 
                <div class="p-30 mb-30 card-view">
                    @foreach($pidioObj as $vhePhut)
                    <div class="mb-30 sided-250x s-lg-height card-view">
                        @if($vhePhut->exists())
                        <div class="s-left">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($vhePhut->file)!!}" allowfullscreen></iframe>
                        </div>                        
                        <div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
                            <h4 class="color-blue"><a>{{ ucwords($vhePhut->caption)}} </a>
                            </h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{ $vhePhut->created_at->format('d M Y') }}</li>
                                <li><i class="mr-5 font-12 ion-android-person"></i>{{ $vhePhut->admins->name }}</li>
                            </ul>
                            <p class="mt-10">{!!substr(strip_tags($vhePhut->sumber),0,100 )!!}...
                            </p>
                        </div>
                        @endif                
                    </div>
                    @endforeach
                    <div style="text-align: center;">
                        {{ $pidioObj->links() }}
                    </div>
                </div>
            </div>
			<div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        <ul>
                            @foreach($jenisBeritaObj as $jenis)
                            <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }} </a></h5>
                            <hr>
                            @endforeach
                        </ul>                          
                    </div><!-- sided-80x -->
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>RATING TERTINGGI</b></h4>
                    @foreach($putryObj as $sacry)
                    @if($sacry->media_berita()->exists() && file_exists('./'.$sacry->media_berita('jenis','=','foto')->first()->file))
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset($sacry->media_berita->first()->file)}}" alt="Rating berita veky">
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
                    @else
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset('media/veky.png')}}" alt="Rating berita veky">
                        </div>
                        <div class="s-right">
                            <h5><a href="{{ route('deber',['id'=>$sacry->id,'slug'=>str_slug($sacry->judul)]) }}"> <b>{{ ucwords($sacry->judul)}}</b></a></h5>
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
            </div>
        </div>
    </div>
</section>
@stop

 