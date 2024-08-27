<!DOCTYPE html>
<html lang="en">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN | DESA</title> 
  <meta name="keywords" content="kakaa" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="DESA desa">
  <meta name="author" content="desa.co.id">
  <link rel="shortcut icon" href="{{ asset('media/veky.ico') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('media/veky.ico') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('startboot/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('startboot/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('startboot/css/sb-admin.css')}}" rel="stylesheet"> 
</head>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="">DESA</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      @csrf  
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> 
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{asset (Auth::user()->file)}}" class="user-image img-responsive" style="width: 30px; height: 30px; top: 10px; left: 10px; border-radius: 30%;" alt="foto admin">
          <span class="hidden-xs">{{ ucwords (Auth::user()->name) }}</span>
          <!-- <i class="fas fa-user-circle fa-fw"></i> -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item text-center" href=" ">{{ ucwords (Auth::user()->name) }}</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><small>Tanggal Terdaftar :  {{ Auth::user()->created_at->format('d M Y')  }}</small></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item  btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
      </li>
    </ul>
  </nav>
   <div id="wrapper">
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-fw fa-circle"></i> <span>Keluar</span>
        </a>
      </li>
    </ul>
    <div class=" container text-center my-auto"> 
      <h2>
        <small>MAAF ANDA TIDAK </small>
        PUNYA HAK AKSES
        <small>SILAHKAN HUBUNGI ADMIN </small>
      </h2>
    </div>
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright©vekyhanas 2019</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
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
</body>
@yield('script')
</html>
