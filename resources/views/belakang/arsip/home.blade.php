@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Arsip</h3>
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
                            <i class="fa fa-table"></i> Data Arsip 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('arsip.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>ID </th>
                            <th>Nama - Deskripsi</th> 
                            <th>Admin Tambah / Ubah</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>ID </th>
                            <th>Nama - Deskripsi</th> 
                            <th>Admin Tambah / Ubah</th>  
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td>
                                <div class="text-center"> 
                                <strong> 
                                    <a href="{{ route('arsipsip',[$val->id,$slug = Str_slug($val->judul)]) }}">{!!ucfirst($val->judul)!!}</a>
                                </strong>
                                </div>
                                <hr>
                                <strong> Status : </strong> {{ucwords($val->publish) }}
                                <a href="{{ url($val->file)}}" class="btn btn-sm btn-success float-right" download><i class="fa fa-fw fa-file" title="Unduh"></i> Unduh File</a>
                                <br>
                                <p>
                                    <br>
                                    @if($val->publish == 'publish')
                                    <strong>Oleh :</strong> {{ ucfirst($val->adminoo->name)}}
                                    <a class="float-right">{{ ucfirst($val->publish_at)}}</a>
                                    @else
                                    <strong>Oleh :</strong> ---------
                                    @endif
                                </p>
                                <hr>
                                <strong>Jenis :</strong>
                                {{ucwords($val->jenis_arsip->jenis) }}
                                <hr>
                                <strong>Deskripsi :</strong> 
                                <p>{!!substr(strip_tags($val->deskripsi),0,100)!!}...
                                </p>
                                <hr>
                                <strong>Keterangan :</strong> 
                                <p>
                                {!!substr(strip_tags($val->keterangan),0,20)!!}...
                                </p>
                            </td>
                            <td>
                                <strong>{{ ucfirst($val->admins->name)}} </strong> 
                                <hr>
                                {{ $val->created_at}} 
                                <hr>
                                <strong>{{ ucfirst($val->admin->name)}} </strong> 
                                <hr>
                                {{ $val->updated_at}}
                            </td>                                 
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                     <div class="form-group">
                                   
                                   <a href="{{ route('arsip.edit',$val->id) }}"  class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit" title="Ubah"></i> Ubah</a>
                                   <hr>
                                   <a href="{{ route('arsip.show',$val->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
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
 