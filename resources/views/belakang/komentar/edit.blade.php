@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Komentar Berita <strong>{{ $berita->judul }}  </strong></h3>
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <a href="{{route('berita.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Berita </a>
                            <a href="{{route('berita.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Komentar</a>
                            <a><i class="fa fa-edit"></i> Ubah Komentar Berita</a> 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('komentar.index', ['berita'=>$berita->id,'id'=>(($komentar) ? $komentar->id : null)])}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('komentar.update',[$berita->id,(($komentar) ? $komentar->id : null)]) }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-row">
                            <div class=" col-md-4 form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
                                </label>
                                <div>
                                    <input type="text" value="{{$komentar->nama}}" id="nama" name="nama" class="form-control">
                                    @if ($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">e-mail <span class="required">*</span>
                                </label>
                                <div>
                                    <input type="text" value="{{$komentar->email}}" id="email" name="email" class="form-control">
                                    @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="komentar">Komentar <span class="required">*</span>
                        </label>
                        <div>
                            <textarea id="komentar" class="form-control" rows="8" name="komentar">{{ old('komentar') ? old('komentar') : ($komentar ? $komentar->komentar : '') }}</textarea>
                            @if ($errors->has('komentar'))
                            <span class="help-block">{{ $errors->first('komentar') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="PUT">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script> 
<script>
  var komentar = document.getElementById("komentar");
    CKEDITOR.replace(komentar);
  CKEDITOR.config.allowedContent = true;
</script>
@stop 