<!DOCTYPE html>
<html lang="id">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cari | ITDM</title> 
  <meta name="keywords" content="Desa" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Desa desa">
  <meta name="author" content="desa.co.id">
  <link rel="shortcut icon" href="{{ asset('media/logo.png') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('media/logo.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('startboot/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('startboot/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('startboot/css/sb-admin.css')}}" rel="stylesheet"> 
  <!-- {{-- CKEditor CDN --}} -->
< 
 


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
        
      </li>
    </ul>
  </nav>
  <div id="wrapper"  >
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Cari</span>
        </a>
      </li>
       
       
       
       

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="">
          <i class="fa fa-fw fa-circle"></i> <span>Anggota</span>
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
  
</body>
@yield('script')
</html>
