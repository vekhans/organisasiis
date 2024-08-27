@extends('layouts.temp.ednes')
@section('content')
<head>  
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 300px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style> 
</head> 
<section class="ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                    <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>KONTAK</b></a>
                </ol>
            </div>
            <div class="col-md-12 col-lg-6"> 
                <div id="kontak" class="mb-30 p-30 ptb-sm-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b>TINGGALKAN PESAN</b></h4>
                    @foreach($kontak as $vheput)   
                    @endforeach
                    @if(session('status'))
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>{{session('status')}}</strong>
                    </div>
                    @endif
                    <form action="{{ route('kontak.save')}}" method="post" class="p-5 grey-text">
                        {{ csrf_field() }}
                        <div class="md-form form-sm">
                            <i class="fa fa-fw fa-user prefix"></i>
                            <input type="text" name="nama" class="form-control form-control-sm" id="nama"  placeholder="Nama Anda" required data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                            <div class="validation"></div>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-fw fa-envelope prefix"></i>
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email Anda" data-rule="email" required data-msg="Please enter a valid email"/>
                            <div class="validation"></div>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-fw fa-tag prefix"></i>
                            <input type="text" name="perihal" class="form-control form-control-sm" id="perihal" placeholder="Perihal / Subjek" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-fw fa-pencil prefix"></i> 
                            <textarea id="komentar"class="md-textarea form-control form-control-sm" name="komentar" rows="5" required data-msg="Please write something for us" placeholder="Masukan Komentar Anda"></textarea>
                            <div class="validation"></div>
                            <div class="text-center">
                                <h6><button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type="submit"><b>Kirim</b></button></h6>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-lg-6"> 
                <div id="lokasi" class="mb-30 p-30 ptb-sm-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b>PETA Cabang Organisasi</b></h4>
                    @foreach($jakObj as $eahun)
                    <div class="row text-center">
                        <ul>
                            <li>
                                <p><i class="fa fa-fw fa-building prefix"></i> {{ $eahun->alamat }} /  <i class="fa fa-fw fa-phone prefix"></i> {{ $eahun->tlpn }} / <i class="fa fa-fw fa-envelope prefix"></i> {{ $eahun->email }}  </p>
                            </li>
                        </ul>
                    </div>
                    <div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 300px">
                        <div id="map">
                            <script>
                                function initMap() {
                                    var lokasio = {lat:{{$eahun->lt}}, lng:{{$eahun->lg}}};
                                    var map = new google.maps.Map(document.getElementById('map'), {zoom: 18, center: lokasio});
                                var marker = new google.maps.Marker({position: lokasio, map: map});
                                }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwFoTSunpzZ4SDem01uPp-tAONrr_xqwQ&callback=initMap">
                            </script>
                        </div>
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