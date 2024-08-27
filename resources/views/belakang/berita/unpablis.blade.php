@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Berita Belum Publish</h3>
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
                            <i class="fa fa-table"></i> Data Berita 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('berita.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>ID </th>
                            <th>Judul - Deskripsi</th> 
                            <th>Admin Tambah / Ubah</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>ID </th>
                            <th>Judul - Deskripsi</th> 
                            <th>Admin Tambah / Ubah</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td>
                                <strong> 
                                    <a href="{{ route('adeber',['id'=>$val->id,'slug'=>str_slug($val->judul)]) }}">{{ ucwords($val->judul)}} </a>
                                </strong>
                                <hr>
                                <strong class=""> Status : </strong>
                                {{ucwords($val->publish) }}
                                <a href=""  class="btn btn-sm btn-success float-right"><i class="fa fa-fw fa-file" title="Ubah"></i> PDF</a>
                                <hr>
                                <strong> 
                                    Jenis : 
                                </strong>
                                {{ucwords($val->jenis_berita->jenis) }}
                                <hr>
                                <strong>Deskripsi :</strong> 
                                <p>{!!substr(strip_tags($val->deskripsi),0,900)!!}...
                                </p>
                                <hr>
                                <strong>Keterangan :</strong> 
                                <p>
                                {!!substr(strip_tags($val->keterangan),0,20)!!}...
                                </p>
                            </td> 
                            <td>
                                <strong>{{ucfirst($val->admina->name)}}</strong> <hr> <span class="hidden-xs">{{$val->created_at}}</span>
                                <hr>
                                <strong>{{ucfirst($val->admin->name)}}</strong> <hr> <span class="hidden-xs">{{$val->updated_at}}</span>
                            </td>
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    <div class="form-group">
                                        <a href="{{ route('meber.index', $val->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-plus" title="Media"></i> Media</a>
                                        <hr>
                                        <!-- <a href="{{route('komentar.index',$val->id)}}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-edit" title="Ubah"></i> Pesan</a>
                                        <hr> -->
                                        <a href="{{ route('berita.edit', ['id' => $val->id]) }}"  class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit" title="Ubah"></i> Ubah</a>
                                        <hr>
                                        <a href="{{ route('berita.show', ['id' => $val->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
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
