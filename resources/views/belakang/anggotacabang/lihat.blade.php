@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Profil Anggota </h3>
        <hr/>
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>

                            <a href="{{route('profil.index')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Data Anggota</a>

                        </div>  
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="card-header">
                <img id="img-preview" class="img-responsive" src="{{asset('media/logo.png')}}" width="100%" height="50%" />
                </div>
                <div class="form-row">
                    <div class="col-md-12" style="text-align: left;"> 
                        <div class="form-group"><p><strong> Nama Cabang     : </strong> {{ucfirst($cabang->nama)}} </p>
                            <p><strong> Lokasi Cabang   : </strong> {{($cabang->cabangidkab->nama)}} </p>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12" style="text-align: left;"> 

                        <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th> 
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th> 
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody> 
                        @foreach ($anggotacabang as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$row->id_anggota}}
                            </td>
                             
                            <hr>
                             
                            </td>
                             
                            <td>
                                <div class="text-center">
                                    <img id="img-preview" src="{{ asset($row->cabanganggotacabang->angotacabanggota->file) }}" class="img-responsive rounded-circle" style="height: 90px; width: 110px;" alt="foto user">
                                </div>
                            </td>
                            <td class="text-center">
                                 
                            </td>
                        </tr>
                        @endforeach
                         
                    </tbody>
                </table>
            </div>
                         

                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="col-md-12" style="text-align: left;"> 
                        <div>
                            <p><strong> DESKRIPSI      : </strong>  </p>
                            <P>
                                 
                            </P>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection