@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Komentar Berita <strong>{{ $berita->judul }}  </strong></h3>
        <hr/>
        @if(session('status'))
          <div class="alert alert-info">
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
                            <a href="{{route('berita.index')}}" class="active"><i class="fa fa-fw fa-table"></i> Data Berita</a>
                            <i class="fa fa-edit"></i> Komentar Berita
                        </div>
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('berita.index')}}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Komentar</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Komentar</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($val->nama) }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->created_at }}</td>
                            <td>{!!substr(strip_tags($val->komentar),0,200)!!}...</td>
                            <td class="text-center">
                                <form class="formDelete" action="{{route('komentar.destroy',[$berita->id, $val->id])}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    <div class="form-group">
                                    <a href="{{route('komentar.edit',[$berita->id, $val->id])}}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Delete"></i> Ubah </a>
                                    <button type="submit" class="btn btn-sm btn-danger btnDelete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><i class="fa fa-fw fa-trash" title="Hapus"></i> Hapus</button>
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
