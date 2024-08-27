@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Anggota di Cabang
            <strong>{{$cabang->nama}}
            </strong>
         </h3> 
        <hr/>
        @if(session('status'))
        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>{{session('status')}}</strong>
        </div>
        @endif
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <a href="{{route('cabang.index')}}" class="active"><i class="fa fa-fw fa-table"></i> Data Cabang <strong>{{$cabang->nama}}</strong></a>
                            <i class="fa fa-table"></i> Data Kabupaten 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                           <!--  <a href="{{route('lihat', $cabang->id)}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Priview</a>  -->
                            <a href="{{route('anggotacabang.create', $cabang->id)}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th width="3%">#</th>
                            <th>Nama Anggota</th>
                            <th>NIK</th>
                            <th>No. KTA</th>
                            <th>Foto Anggota</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th  width="3%">#</th>
                            <th>Nama Anggota</th>
                            <th>NIK</th>
                            <th>No. KTA</th>
                            <th>Foto Anggota</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ ucfirst($val->angotacabanggota->nama)}}</td>
                            <td>{{ ucfirst($val->angotacabanggota->nik)}}</td>
                            <td>{{ ucfirst($val->angotacabanggota->nokta)}}</td>
                            <td>
                                <div class="text-center">
                                    <img id="img-preview" src="{{ asset($val->angotacabanggota->file) }}" class="img-responsive rounded-circle" style="height: 90px; width: 110px;" alt="foto anggota">
                                </div>
                            </td>
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                     
                                    <div class="form-group">
                                        <a href="{{ route('anggotacabang.edit', [$cabang->id,$val->id]) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah"></i> Ubah</a>   
                                       
                                        <a href="{{ route('anggotacabang.show',[$cabang->id,$val->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
                                    </div>
                                </form>
                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" class="text-center">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
