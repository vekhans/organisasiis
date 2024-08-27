@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Provinsi</h3>
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
                            <i class="fa fa-table"></i> Data Provinsi 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('provinsi.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead text-center" style="background-color: #009; color: white">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tgl. Tambah Data</th>
                            <th>Tgl. Ubah Data</th>
                            <th>Oleh Admin</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
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
                            <td>{{ $val->created_at}}</td>
                            <td>{{ $val->updated_at}}</td>
                            <td>{{ ucfirst($val->provadminad->name)}}</td>
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    <div class="form-group">
                                        <a href="{{ route('kabupaten.index', $val->id) }}"  class="btn btn-sm btn-primary"><i class="fa fa-table" title="Kabupaten"></i> Kabupaten</a>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('provinsi.edit', $val->id) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah"></i> Ubah</a>   
                                       
                                        <a href="{{ route('provinsi.show',$val->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
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
