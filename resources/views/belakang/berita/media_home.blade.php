@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h4>
                Data Media Berita <a>:{!!' <strong>'.$media_berita->judul.'</strong>'!!}</a>
            </h4>
        </section>
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-8" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <a href="{{ route('berita.index') }}"><i class="fas fa-fw fa-table -alt"> </i> Berita</a>
                            <a><i class="fas fa-fw fa-edit"></i> Tambah Media Berita </a>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <a href="{{route('meber.create',$media_berita->id)}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                            <a href="{{ route('berita.index') }}" style="text-align: right;" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('status')}}</strong>
                </div>
                @endif
                <div>
                    <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">

                            <thead class="thead text-center" style="background-color: #009; color: white;">
                                <tr>
                                    <th width="5%">#</th>
                                    <!-- <th width="10%">Jenis Media</th> -->
                                    <th width="30%">Caption</th>
                                    <th width="30%">File</th>
                                    <th>Media</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot class="thead text-center" style="background-color: #009; color: white;">
                                <tr>
                                    <th width="5%">#</th>
                                    <!-- <th width="10%">Jenis Media</th> -->
                                    <th width="30%">Caption</th>
                                    <th width="30%">File</th>
                                    <th>Media</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse($data as $val)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <!-- <td>{{ ucfirst($val->jenis) }}</td> -->
                                    <td>{{ $val->caption }}</td>
                                    <td>{{ $val->file }}</td>
                                    <td class="text-center">
                                        @if($val->jenis == 'foto')
                                        <img id="img-preview" class="img-thumbnail" width="100"  src="{{ url($val->file) }}" alt="veky" />
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form class="formDelete form-horizontal" action="{{route('meber.destroy',[$media_berita->id, $val->id])}}" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="id" value="{{ $val->id }}">
                                            <div class="form-group">
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
</div>
@endsection
