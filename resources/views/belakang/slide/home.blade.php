@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Slide</h3>
        <hr/>       
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <i class="fa fa-table"></i> Data Slide 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('slide.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
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
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead text-center" style="background-color: #009; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Caption</th>
                                <th>File</th>
                                <th>Media</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot class="thead text-center" style="background-color: #009; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Caption</th>
                                <th>File</th>
                                <th>Media</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($data as $val)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ ucwords($val->caption) }}</td>
                                <td>{{ $val->file }}</td>
                                <td class="display text-center"><img class="img-thumbnail" width="100" src="{{ url($val->file) }}" alt="{{ $val->caption }}"></td>
                                <td class="text-center">
                                    <form class="formDelete form-horizontal" action="{{route('slide.destroy',$val->id)}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="id" value="{{ $val->id }}">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-danger btnDelete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><i class="fa fa-fw fa-trash" title="Hapus"></i>Hapus
                                            </button>
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
