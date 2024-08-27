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
                            <a href="{{route('arsip.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Arsip </a>
                            <i class="fa fa-edit"></i> Tambah Data Arsip {{ ucwords (Auth::user()->name) }}
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('arsip.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('arsip.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <div class="form-row">
                    <div class="col-md-4 form-group{{ $errors->has('id_jenis') ? ' has-error' : '' }}">
                        <label class="control-label" for="id_jenis">Jenis Arsip <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="id_jenis" name="id_jenis">
                                @if(count($jenisarsip))
                                @foreach($jenisarsip as $row)
                                <option value="{{$row->id}}">{{$row->jenis}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('id_jenis'))
                            <span class="help-block">{{ $errors->first('id_jenis') }}</span>
                            @endif
                        </div>
                    </div> 
                    <div class="col-md-7 form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                        <label for="judul" class="control-label">Nama Arsip <span class="required">*</span></label>
                        <div>
                            <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') ? old('judul') : '' }}" required>

                            @if ($errors->has('judul'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                    </div> 
                    </div>
                    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                        <label for="deskripsi" class="col-md-2 control-label">Deskripsi <span class="required">*</span></label>
                        <div class="col-md-12">
                            <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') ? old('deskripsi') : '' }}"></textarea>

                            @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-2 control-label">File</label>
                        <div class="col-md-10">
                            <input id="file" accept="
                                application/pdf,
                                application/msword,
                                application/vnd.ms-excel,
                                application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                                application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            type="file" class="form-control" name="file" value="{{ old('file') ? old('file') : '' }}" required>

                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                        <label for="keterangan" class="col-md-2 control-label">Keterangan</label>
                        <div class="col-md-10">
                            <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') ? old('keterangan') : '' }}">
                            @if ($errors->has('keterangan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                     




















                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2">
                            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Simpan</button>
                            <a href="{{route('arsip.index')}}" class="btn btn-warning"><i class="fa fa-fw fa-arrow-left"></i>Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/config.js')}}"></script>
<script>
  var deskripsi = document.getElementById("deskripsi");
    CKEDITOR.replace(deskripsi);
  CKEDITOR.config.allowedContent = true;
</script>
@endsection


