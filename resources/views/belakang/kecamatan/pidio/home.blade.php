@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Video</h3>
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
                            <i class="fa fa-table"></i> Data Jenis Video 
                        </div> 
                        <div class="col-md-3" style="text-align: right;">
                            <a href="{{route('video.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Caption / Sumber</th> 
                            <th width="30%">Video</th>
                            <th>Admin Tambah / Ubah Data</th>
                            <th>Status Publish</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Caption / Sumber</th> 
                            <th width="30%">Video</th>
                            <th> Admin Tambah / Ubah Data</th>
                            <th>Status Publish</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{($val->id)}}</td>
                            <td>
                                {{ ucfirst($val->caption)}}
                                <hr>
                                {{ ucfirst($val->sumber)}}
                            </td>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!!($val->file)!!}" allowfullscreen style="widows: 500px">
                                    </iframe>
                                </div>
                            </td>
                            <td>
                                {{ ucfirst($val->admins->name)}}
                                <hr>
                                {{ $val->created_at}} 
                                <hr>
                                {{ ucfirst($val->admin->name)}}
                                <hr>
                                {{ $val->updated_at}}
                            </td>
                            <td class="text-center">
                                <strong>{{ ucfirst($val->publish)}}
                                </strong>
                                <hr>
                                @if($val->publish == 'publish')
                                {{ ucfirst($val->adminoo->name)}}
                                <hr>
                                {{ ucfirst($val->publish_at)}}
                                <hr>
                                <form method="post" action="{{ route('unvideoshit', $val->id) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye" title="Tarik"></i> Tarik dari Publik</button>
                                    </div>
                                </form>
                                @else
                                <form method="post" action="{{ route('videoshit', $val->id) }}" data-parsley-validate >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $val->id }}"> 
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-eye" title="Publish"></i> Publish Sekarang</button>
                                </form>
                                @endif
                            </td>
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                     <div class="form-group">
                                    <a href="{{ route('video.edit',$val->id) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah"></i> Ubah</a> 
                                    <hr> 
                                    <a href="{{ route('video.show', $val->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
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