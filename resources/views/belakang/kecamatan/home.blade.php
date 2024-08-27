@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Kecamatan di Kabupaten <strong>{{$kabupaten->nama}}
            </strong></h3>
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
                            <a href="{{route('provinsi.index')}}" class="active"><i class="fa fa-fw fa-table"></i> Data Provinsi <strong>{{$provinsi->nama}}</strong> </a>
                            <a href="{{route('kabupaten.index',$provinsi->id)}}" class="active"><i class="fa fa-fw fa-table"></i> Data Kabupaten <strong>{{$kabupaten->nama}}</strong> </a>
                            <i class="fa fa-table"></i> Data Kecamatan 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('kecamatan.create', [$provinsi->id,$kabupaten->id])}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>#</th>
                            <th>Nama Kecamatan</th>
                            <th>Nama Kabupaten</th>
                            <th>Tgl. Tambah Data</th>
                            <th>Tgl. Ubah Data</th>
                            <th>Oleh Admin</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>#</th>
                            <th>Nama Kecamatan</th>
                            <th>Nama Kabupaten</th>
                            <th>Tgl. Tambah Data</th>
                            <th>Tgl. Ubah Data</th>
                            <th>Oleh Admin</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($val->nama)}}</td>
                            <td>{{ ucfirst($val->kecidkab->nama)}}</td>
                            <td>{{ $val->created_at}}</td>
                            <td>{{ $val->updated_at}}</td>
                            <td>{{ ucfirst($val->kecadminad->name)}}</td>
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    <div class="form-group">
                                        <a href="{{ route('desa.index', [$provinsi->id, $kabupaten->id, $val->id]) }}"  class="btn btn-sm btn-primary"><i class="fa fa-table" title="Data Desa"></i> Data Desa</a>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('kecamatan.edit', [$provinsi->id, $kabupaten->id, $val->id]) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah"></i> Ubah</a>   
                                       
                                        <a href="{{ route('kecamatan.show',[$provinsi->id, $kabupaten->id, $val->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
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
