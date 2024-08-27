@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Berita</h3>
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
                            <a href="{{route('berita.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Berita </a>
                            <i class="fa fa-edit"></i> Tambah Data Berita 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('berita.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('berita.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <div class="form-row">
                    <div class="col-md-4 form-group{{ $errors->has('id_jenis') ? ' has-error' : '' }}">
                        <label class="control-label" for="id_jenis">Jenis Berita <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="id_jenis" name="id_jenis">
                                @if(count($jenisberita))
                                @foreach($jenisberita as $row)
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
                        <label for="judul" class="control-label">Judul Berita <span class="required">*</span></label>
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
                    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                        <label for="keterangan" class="col-md-2 control-label">Keterangan</label>
                        <div class="col-md-8">
                            <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') ? old('keterangan') : '' }}">

                            @if ($errors->has('keterangan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                        <label for="rating" class="col-md-2 control-label"> </label>

                        <div class="col-md-2">
                            <input id="rating" type="hidden"  class="form-control" name="rating" value="{{ old('rating') ? old('rating') : 00.00 }}">
                            @if ($errors->has('rating'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rating') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2">
                            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Simpan</button>
                            <a href="{{route('berita.index')}}" class="btn btn-warning"><i class="fa fa-fw fa-arrow-left"></i>Batal</a>
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


