@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Berita</h3>
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <a href="{{route('berita.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Berita </a>
                            <a><i class="fa fa-edit"></i> Ubah Data Berita :{!!' <strong>'.$beritas->judul.'</strong>'!!}</a> 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('berita.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('berita.update', $beritas->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 form-group{{ $errors->has('id_jenis') ? ' has-error' : '' }}">
                                <label class="control-label col-md-6 col-sm-6 col-xs-6" for="id_jenis"> Jenis Berita <span class="required">*</span>
                                </label>
                                <div>
                                    <select class="form-control" id="id_jenis" name="id_jenis">
                                        @if(count($jenisberita))
                                        @foreach($jenisberita as $row)
                                        <option value="{{$row->id}}" {{$row->id == $beritas->id_jenis ? 'selected="selected"' : ''}}>{{$row->jenis}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('id_jenis'))
                                    <span class="help-block">{{ $errors->first('id_jenis') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="col-md-6 {{ $errors->has('judul') ? ' has-error' : '' }}">
                                <label class="control-label col-md-6 col-sm-6 col-xs-6" for="judul">Judul Berita<span class="required">*</span>
                                </label>
                                <div>
                                    <input type="text" value="{{$beritas->judul}}" id="judul" name="judul" class="form-control">
                                    @if ($errors->has('judul'))
                                    <span class="help-block">{{ $errors->first('judul') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-11 form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="deskripsi">Deskripsi <span class="required">*</span>
                            </label>
                            <div>
                                <textarea id="deskripsi" class="form-control" rows="20" name="deskripsi">{{ old('deskripsi') ? old('deskripsi') : ($beritas ? $beritas->deskripsi : '') }}</textarea>
                                @if ($errors->has('deskripsi'))
                                <span class="help-block">{{ $errors->first('deskripsi') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-10 form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="keterangan">Keterangan
                            </label>
                            <div>
                                <input type="text" value="{{$beritas->keterangan}}" id="keterangan" name="keterangan" class="form-control col-md-7 col-xs-6">
                                @if ($errors->has('keterangan'))
                                <span class="help-block">{{ $errors->first('keterangan') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-fw fa-plus"></i> Simpan</button>
                                <a href="{{route('berita.index')}}" class="btn btn-warning"> <i class="fa fa-fw fa-arrow-left"></i>  Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script> 
<script>
    var deskripsi = document.getElementById("deskripsi");
    CKEDITOR.replace(deskripsi);
    CKEDITOR.config.allowedContent = true;
</script>
@stop 