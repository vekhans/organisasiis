<!DOCTYPE html>
<html lang="id">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | ITDM</title> 
  <meta name="keywords" content="Desa" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Desa desa">
  <meta name="author" content="desa.co.id">
  <link rel="shortcut icon" href="{{ asset('media/logo.png') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('media/logo.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('startboostrap/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>



</head>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-primary static-top">
    <a class="navbar-brand mr-1" href="">ITDM</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      @csrf  
      <!-- <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> --> 
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{asset (Auth::user()->file)}}"  class="user-image img-responsive" style="width: 30px; height: 30px; top: 10px; left: 10px; border-radius: 30%  color: rgb(255,0,0);" alt="foto admin">
          <span class="hidden-xs">{{ ucwords (Auth::user()->name) }}</span>
          <!-- <i class="fas fa-user-circle fa-fw"></i> -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item text-center" href="#">{{ ucwords (Auth::user()->name) }}</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><small>Tanggal Terdaftar :  {{ Auth::user()->created_at->format('d M Y')  }}</small></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item  btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper"  >
    <ul class="sidebar navbar-nav" style="background-color: #1703AB">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>DASHBOARD</span>
        </a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>ADMIN</span>
        </a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profil.index') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>PROFIL</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('provinsi.index') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>PROVINSI</span>
        </a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="{{ route('anggota.index') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>ANGGOTA</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cabang.index') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>CABANG</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('slide.index') }}">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>SLIDE</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('jenisberita.index') }}">
          <i class="fa fa-fw fa-edit"></i> <span>JENIS BERITA</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('jenisarsip.index') }}">
          <i class="fa fa-fw fa-edit"></i> <span>JENIS ARSIP</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('arsip.index') }}">
          <i class="fa fa-fw fa-folder"></i> <span>ARSIP</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>BERITA</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">KUMPULAN BERITA</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('berita.index') }}"><i class="fa fa-fw fa-circle"></i> SEMUA BERITA</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=""><i class="fa fa-fw fa-chart-area"></i> BERITA PUBLISH</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=" "><i class="fa fa-fw fa-chart-area"></i>BERITA UNPUBLISH</a>
          <div class="dropdown-divider"></div>
          <!--<h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('video.index') }}">
          <i class="fas fa-fw fa-video"></i> <span>VIDEO</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kontak.index') }}">
          <i class="fa fa-fw fa-book"></i> <span>KONTAK</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-fw fa-circle"></i> <span>KELUAR</span>
        </a>
      </li>
    </ul>
    <div id="content-wrapper">
      @include('layouts.temp.partials.alerts')
      @yield('content')
    </div>
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright©kaakaveky 2022</span>
        </div>
      </div>
    </footer>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" Jika Anda Yakin Untuk akhiri session ini.. Terimakasi!!.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Keluar</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('startboot/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('startboot/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('startboot/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('startboot/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('startboot/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('startboot/js/sb-admin.min.js')}}"></script>
  <script src="{{asset('startboot/js/demo/datatables-demo.js')}}"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
</body>
@yield('script')
@yield('foother')

</html>
