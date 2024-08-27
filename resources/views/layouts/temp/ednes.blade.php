<!DOCTYPE HTML>
<html lang="id">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title}} | ITDM</title> 
  <meta name="keywords" content="desa" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ITDM itdm">
  <meta name="author" content="itdm.co.id">
  <meta name="news_keywords" content="ntt, nusa tenggara timur, kabupaten, kupang, kabupaten Kupang">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('media/logo.png') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('media/logo.png') }}">
  <link href="{{asset('ednews/plugin-frameworks/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('ednews/fonts/ionicons.css')}}" rel="stylesheet">
  <link href="{{asset('ednews/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('ednews/common/styles.css')}}" rel="stylesheet">
  <link href="{{asset('ednews/bootstrap3/css/bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('ednews/bootstrap3/css/font-awesome.css')}}" rel="stylesheet"> 
  <link href="{{asset('startboot/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
  <div class="container text-center">
    <a href="{{route('beranda')}}">
      <div class="logo-container" >
        <div class="logo">
          <img src="{{asset('media/logo.png')}}" class="img-responsive" style="width: 100px; height: 80px; top: 10px; left: 10px; border-radius: 30%;" alt="icon">
        </div>         
      </div>
    </a> 
  </div>
</head>
<body>
  <header>
    <div class="bottom-menu">
      <div class="container text-center">
        <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
        
        <ul class="main-menu" id="main-menu">
          <li>
            <a href="{{route('beranda')}}">BERANDA</a>
          </li>
          <li>
            <a href="{{ route('profil')}}">PROFIL</a>
          </li>
          <li>
            <a href="{{ route('berall')}}">BERITA</a>
          </li>
          <li>
            <a href="{{ route('pidio')}}">VIDEO</a>
          </li>
          <li>
            <a href="{{ route('pesans')}}">KONTAK</a>
          </li>
          <li>
            <a href="{{ route('arsipall')}}">ARSIP</a>
          </li>
          <li>
            <a href="{{ route('carisanggota')}}">KEANGGOTAAN</a>
          </li>
         </ul>
        <div class="clearfix"></div>
       </div>
    </div>
  </header>   
@yield('content')
<footer class="bg-dark-primary ptb-15 pos-relative pt-50">
  <div class="abs-tblr pt-50 z--1 text-center">
    <div class="h-80 pos-relative">
      <div class="bg-map abs-tblr opacty-1"></div>
    </div>
  </div>
  <a class="scroll-to-top hidden-mobile visible" href="#"><i class="fa fa-chevron-up"></i></a>
  <div class="container">
    <div class="row color-lite-black">
      <div class="col-lg-5 col-md-5 col-sm-5">    
        <h5 class="f-title"><b>SITE MAP</b></h5>
        <ul class="mb-30 list-hover list-block list-a-ptb-5">
          <li><a href="{{route('beranda')}}">Beranda</a>
            <p>Beranda adalah Menu yang menampilkan berita terupdate dan berita terbaru </p> 
          </li>
          <li><a href="{{route('profil')}}">Profil</a></li>
          <p>Menampilkan halaman Profil dari website ini  </p>
          <li><a href="{{route('berall')}}">Berita</a></li>
          <p>Menampilkan semua Berita berdasarkan berita terbaru </p>
        </ul>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">    
        <h5 class="f-title"><b>SITE MAP</b></h5>
        <ul class="mb-30 list-hover list-block list-a-ptb-5">
          <li><a href="{{route('pidio')}}">Video</a></li>
          <p>Menampilkan semua Video berdasarkan video terbaru </p>
          <li><a href="{{route('pesans')}}">Kontak</a></li>
          <p>Menampilakn halaman untuk memberikan pesan/komentar dan alamat/kontak yang bisa dihubungi </p>
          <li><a href="{{route('arsipall')}}">Arsip</a></li>
          <p>Menampilakn halaman untuk arsip yang disediakan oleh kami yang bisa diunduh</p>
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">    
        <h5 class="f-title"><b>TENTANG KAMI</b></h5>
        <div class="sided-80x mb-30">
          @foreach ($propil as $val)
          <ul class="mb-30 list-hover list-block list-a-ptb-5">
            <li><a href="{{ route('profil')}}">Profil  {{$val->nama}} </a></li>
            <li><a href="{{ route('pesans','#lokasi')}}">Alamat : {{$val->alamat}}</a></li>
            <li><a href="{{ route('pesans','#kontak')}}">Telepon : {{$val->tlpn}}</a></li>
            <li><a href="{{ route('pesans','#kontak')}}">email   : {{$val->email}}</a></li>
          </ul>
          @endforeach
        </div>
      </div>
    </div>
    <div class="mt-20 brdr-ash-1 opacty-4"></div>
    <div class="text-center ptb-30">
      <div class="row">
        <div class="container text-center">
          <a href="{{route('beranda')}}">
            <div class="logo-container" >
              <div class="logo">
                <img src="{{asset('media/logo.png')}}" class="logo img-responsive" target="_blank" style="width: 100px; height: 80px; top: 10px; left: 10px; border-radius: 30%;" alt="icon logo">
              </div>
            </div>
          </a>
          <p class="font-10 pt-5 mtb-5">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          </p>
          <p class="font-9 pt-5 mtb-5">
            Modify with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://itdm.online" target="_blank">ITDM</a>
          </p> 
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="{{asset('ednews/plugin-frameworks/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('ednews/plugin-frameworks/tether.min.js')}}"></script>
<script src="{{asset('ednews/plugin-frameworks/bootstrap.js')}}"></script>
<script src="{{asset('ednews/common/scripts.js')}}"></script>
<script src="{{asset('ednews/jquery/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('ednews/bootstrap3/js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('startboot/js/sb-admin.min.js')}}"></script>
<script src="{{asset('startboot/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('startboot/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  
  <script src="{{asset('startboot/js/demo/datatables-demo.js')}}"></script>

<script type="text/javascript">  
  $('.btn-tooltip').tooltip();
  $('.label-tooltip').tooltip();
  $('.carousel').carousel({
    interval: 5000
  });
</script>
@yield('script')
  Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-12345678-1']);
    _gaq.push(['_trackPageview']);      
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>  
</body>
</html>