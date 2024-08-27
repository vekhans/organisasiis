@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen User / Pengguna</h3>
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
                        <div  class="col-md-9" style="text-align: left;"> 
                            <a href="" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <i class="fa fa-table"></i> Data User 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            @if (Auth::user()->aturan == 'ijo')
                            <a href="{{route('admin.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                            @else
                            -
                            @endif
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
                        @if(count($data))
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$row->name}}
                                <hr>
                                {{$row->lengkap}}
                            </td>
                            <td>{{$row->email}}
                            <hr>
                            {{$row->posisi}}
                            </td>
                             
                            <td>
                                <div class="text-center">
                                    <img id="img-preview" src="{{ asset($row->file) }}" class="img-responsive rounded-circle" style="height: 90px; width: 110px;" alt="foto user">
                                </div>
                            </td>
                            <td class="text-center">
                                @if (Auth::user()->aturan == 'ijo')
                                <a href="{{ route('admin.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit" title="Ubah"></i> Ubah</a>
                            
                                <a href="{{ route('admin.show', $row->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" title="Hapus"></i> Hapus</a>
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection