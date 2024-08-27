@extends('layouts.temp.ednes')
@section('content')
<head> 
    <!-- Comment #1: OG Tags -->
    <meta property="og:url"           content="" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="desa.com" />
    <meta property="og:description"   content="Ini adalah Website desa desa" />
    @foreach($berita->media_berita as $media)
    @if($media->jenis == 'foto')
    <meta property="og:image"         content="{{ asset($media->file) }}" />
    @endif
    @endforeach
</head> 
<section class="ptb-30">
    <script>
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
                <ul class="breadcrumb">
                    <div>
                        <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                        <a href="{{ route('berall') }}"><i class="mlr-10 ion-chevron-right"></i><b>BERITA</b></a>
                        <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>{{ ucwords($berita->judul)}}</b></a>
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
                    <strong>  STATUS PUBLISH = {{ucwords($berita->publish)}} </strong>
                    <br>
                    <a href="{{route('reporter-berita.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="p-30 mb-30 card-view">
                    @if($berita->media_berita()->exists() && file_exists('./'.$berita->media_berita->first()->file))
                    <div id="kontrol" class="carousel slide" data-ride="carousel">
                        <div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="carousel-inner">
                                    @foreach($berita->media_berita as $media)
                                    @if($media->jenis == 'foto')                              
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class="d-block w-100 img-responsive" src="{{ asset($media->file) }}" alt="media berita desa">
                                        <div class="carousel-caption d-none d-md-block">
                                            <div style="text-align: center;">
                                                <span style="color: #f0FF; font-family: Verdana,Arial,Helvetica; font-size: 14px;">{{ucwords ($media->caption)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
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
                    </div>
                    @else 
                    <div id="ekontrol" class="carousel slide" data-ride="carousel"> 
                        <div class="d-flex justify-content-center mb-4">
                            <div class="carousel-inner">
                                <img src="{{ asset('media/veky.png')}}" alt="gambar desa">
                                <div class="carousel-caption d-none d-md-block">
                                    <div style="text-align: center;">
                                        <span style="color: #f0FF; font-family: Verdana,Arial,Helvetica; font-size: 14px;">Gambar default</span>
                                    </div> 
                                </div>                                    
                            </div> 
                        </div>                         
                    </div> 
                    @endif
                    <ul class="breadcrumb" style="background-color: #eeeeee;">
                        <h3 class="mt-30 mb-5"><a href=""><b>{{ ucwords($berita->judul)}}</b></a></h3>
                        <ul class="list-li-mr-10 color-lite-black">
                            <li><i class="mr-5 font-12 ion-clock"></i>{{ $berita->created_at->diffForHumans() }}</li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>{{ ucwords($berita->admin->name) }}</li>
                            <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>{{($berita->comment_count)}}</li>
                            <li><i class="mr-5 font-12 ion-eye"></i>
                            {{($berita->visit_count)}}</li>
                            <!--  <fb:like width="200" show_faces="yes" href="http://www.fbrell.com"></fb:like> -->
                            <span class="price">
                                @for($n=1; $n<= $berita->rating; $n++)
                                <i class="fa fa-star" style="color: #f0FF"></i>
                                @endfor
                                @for($n=4; $n>= $berita->rating; $n--)
                                <i class="fa fa-star-o"></i>
                                @endfor
                            </span>
                            <fb:share-button href="http://www.fbrell.com" type="button_count" width="200" show_faces="yes"></fb:share-button>
                        </ul>
                    </ul> 
                    <p class="mt-30">
                        {!!($berita->deskripsi)!!}
                    </p> 
                    <!-- <div class="sided-half">
                        <ul class="sided-center ptb-5 list-a-p-5 list-a-plr-10 font-11 color-ash">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-google"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="p-30 mb-30 card-view">
					<h4 class="p-title"><b>PESAN</b></h4>
                    @if($berita->komentar()->exists())
                    <ol class="comments oflow-hidden">
					 	@foreach($berita->komentar as $komentar)
					 	<ul id="komentarberita-{{$komentar->id}}">
					 		<div class="sided-90x">
                                <div class="img-thumbnail s-left br-3 oflow-hidden">
                                    <img class="avatar" src="{{ $komentar->gravatar }}" alt="icon gravatar komentar berita">
                                </div>
                                <div class="s-right"> 
                                    <span class="comment-by">
                                        <h5><b>{{$komentar->nama}}</b><span class="ml-10 color-ash font-8"> / {{ $komentar->created_at->diffForHumans() }}</span></h5>
                                        <span class="star">
                                            @for($n=1; $n<= $komentar->rating; $n++)
                                            <i class="fa fa-star" style="color: #f0FF"></i>
                                            @endfor
                                            @for($n=4; $n>= $komentar->rating; $n--)
                                            <i class="fa fa-star-o"></i>
                                            @endfor
                                        </span>
                                    </span>
                                    <p>{{$komentar->komentar}}</p>
                                    <span><a href="#balas-{{$komentar->id}}" class="balaskomentar" data-id="{{$komentar->id}}"><i class="fa fa-reply"></i> Balas</a></span>
                                </div>
                            </div>
                            <div id="formbalas-{{$komentar->id}}"></div>
                            <div class="ml-90 ml-sm-20 mt-20 sided-90x mtb-30">
                                @if($komentar->balasan()->exists())
					 			@foreach($komentar->balasan as $balasan)
                                <div class="sided-90x">
                                    <div class="img-thumbnail s-left br-3 oflow-hidden">
                                        <img class="avatar" alt="gavatar komentator" src="{{ $balasan->gravatar }}">
                                    </div>
                                    <div  class="s-right">
                                        <h5><b>{{$balasan->nama}}</b><span class="ml-3 color-ash font-8"> / {{ $balasan->created_at->diffForHumans() }}</span></h5>
                                        <p class="mt-5 mb-10">{{$balasan->komentar}}
                                        </p> 
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <div class="ml-90 ml-sm-20 mt-20 brdr-grey-1 opacty-6"></div>
                            </div>
                        </ul>
                        @endforeach
                    </ol>
                    @else
                    <div class="alert alert-warning">
                    	<h5 class="color-blue"> <strong class="color-green">Waoo !!! </strong>  Berita ini belum memiliki komentar. Jadilah yang pertama memberi pendapat.
                            </h4>
                    </div>
                    @endif
                </div>
                <div id="vq" class="p-30 mb-30 card-view">
					<h4 class="p-title"><b>BERI PESAN</b></h4>
					<div id="kolom-komentar">
						<div class="kastinggalkomentar">
							<form action="{{ route('berita.komentar',['id'=>$berita->id])}}" method="post"> {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label><i class="fa fa-user prefix"></i>Nama *</label>
                                        <input required type="text" value="" maxlength="100" class="mb-30 form-control" name="nama" id="nama" placeholder="Nama Anda">
                                    </div>
                                    <div class="col-sm-4">
                                        <label><i class="fa fa-envelope prefix"> </i> Email *</label>
                                        <input required type="email" value="" maxlength="100" class="form-control" name="email" id="email" placeholder="Email Anda">
                                        <br>
                                    </div> 
                                    <div class="col-md-4">
                                        <label><i class="fa fa-star prefix"> </i> Rating Berita </label>
                                        <br>
                                        <input type="hidden" class="rating" name="rating" data-filled="fa fa-lg fa-star" data-empty="fa fa-lg fa-star-o">
                                        <br>
                                    </div>
                                    <div class="col-sm-12">
                                        <label><i class="fa fa-pencil prefix"></i> Pesan / Komentar *</label>
                                        <textarea required maxlength="700" rows="10" class=" mb-30 form-control" name="komentar" id="komentar" placeholder="Pesan/Komentar Anda"></textarea>
                                    </div>
                                </div>
                                <div class="row">  
                                    <div class="col-md-12">
                                        <h6><button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type="submit"><b>Kirim</b></button></h6>  
                                    </div>
                                </div>
                            </form>
                        </div>
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
                            </div><!-- left-area --> 
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
                    <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        <div >
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
                    <h4 class="p-title"><b>BERITA TERUPDATE</b></h4>
                    @foreach($berupdateObj as $henuk)
                    @if($henuk->media_berita()->exists() && file_exists('./'.$henuk->media_berita('jenis','=','foto')->first()->file))
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset($henuk->media_berita->first()->file)}}" alt="Rating berita desa">
                        </div>
                        <div class="s-right">
                            <h5><a href="{{ route('deber',['id'=>$henuk->id,'slug'=>str_slug($henuk->judul)]) }}">
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
                            <h5><a href="{{ route('deber',['id'=>$henuk->id,'slug'=>str_slug($henuk->judul)]) }}">
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
                    <h4 class="p-title"><b>RATING TERTINGGI</b></h4>
                    @foreach($putryObj as $sacry)
                    @if($sacry->media_berita()->exists() && file_exists('./'.$sacry->media_berita('jenis','=','foto')->first()->file))
                    <div class="sided-80x mb-20">
                        <div class="s-left">
                            <img src="{{ asset($sacry->media_berita->first()->file)}}" alt="Rating berita desa">
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
                            <img src="{{ asset('media/veky.png')}}" alt="Rating berita desa">
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
                    @foreach($marvein as $rambo)
                    <div class="sided-80x mb-20"> 
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($rambo->file)!!}" allowfullscreen>
                            </iframe>
                        </div>
                        <h5><a href=" ">
                            <b>{{ ucwords($rambo->caption)}}</b></a>
                        </h5>
                        {{ ucwords($rambo->sumber)}}  
                        <span class="price pull-rigth">
                            <i class="mr-5 font-12 ion-clock"></i>
                            {{ $rambo->updated_at->format('d M Y') }}
                        </span>
                    </div>
                    @endforeach
                </div>
                <!-- <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>BERLANGGANAN</b></h4>
                    <form class="form-sm max-w-400x mlr-auto">
                        {{ csrf_field() }}
                        <input type="email" placeholder="Email Anda">
                        <h6><button class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Subscribe</b></button></h6>
                    </form>
                </div> -->
                <!-- <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>TENTANG PENULIS</b></h4>
                    <div class="sided-90x mb-20">
                        <div class="s-left br-3 oflow-hidden">
                            <img src="{{asset('ednews/images/sidebar-profile-1-100x100.jpg')}}" alt="penulis desa">
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
@endsection
@section('script')
<script src="{{ asset('ednews/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
<script type="text/javascript">
    $('.balaskomentar').click(function() {
        var id        = $(this).data('id');
        var komentar  = '';
            komentar += '<div class="kastinggalkomentar">';
            komentar += '    <h3 class="heading-primary">BALAS PESAN</h3>';
            komentar += '    <form action="{{ route('berita.komentar',['id'=>$berita->id])}}/'+id+'" method="post">';
            komentar += '        {{ csrf_field() }}';
            komentar += '        <div class="row">';
            komentar += '                <div class="col-md-12 form-group">';
            komentar += '                    <label>Nama *</label>';
            komentar += '                    <input required type="text" value="" maxlength="100" class="form-control" name="nama" id="nama">';
            komentar += '            </div>';
            komentar += '        </div>';
            komentar += '        <div class="row">';
            komentar += '                <div class="col-md-12 form-group">';
            komentar += '                    <label>Alamat Email *</label>';
            komentar += '                    <input required type="email" value="" maxlength="100" class="form-control" name="email" id="email">';
            komentar += '                </div>';
            komentar += '        </div>';
            komentar += '        <div class="row">';
            komentar += '            <div class="col-md-12 form-group">'; 
            komentar += '                    <label>Komentar *</label>';
            komentar += '                    <textarea required maxlength="700"  class="mb-30 form-control" name="komentar" id="komentar"></textarea>'; 
            komentar += '            </div>';
            komentar += '        </div>';
            komentar += '        <div class="row">';
            komentar += '            <div class="col-sm-4 form-group">';
            komentar += '                <h6><button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type="submit"><b>Kirim</b></button></h6>'; 
            komentar += '            <br>';
            komentar += '            </div>';
            komentar += '            <div class="col-sm-4  form-group">'; 
            komentar += '            <h6><button class="batalbalas mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" data-id="'+id+'"><b>Batal</b></button></h6>';
            komentar += '            </div>';
            komentar += '        </div>';
            komentar += '    </form>';
            komentar += '</div>';
        $('#formbalas').hide();
        $('#vq').hide();
        $('#formbalas-'+id).html(komentar);
    });
    $('.comments').on('click','.batalbalas',function() {
        var id = $(this).data('id');
        $('#formbalas-'+id).html('');
        $('#vq').show();
        return false;
    });
</script>
@endsection