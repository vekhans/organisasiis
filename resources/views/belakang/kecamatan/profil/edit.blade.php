@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Profil</h3>
        <hr/><div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div  class="col-md-9" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <a href="{{route('profil.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Profil </a>
                            <i class="fa fa-edit"></i> Ubah Data Profil 
                        </div> 
                        <div  class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('profil.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('profil.update', $profils->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12 {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$profils->nama}}" id="nama" name="nama" class="form-control" required="required">
                                    @if ($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                    @endif 
                                    <label for="nama">Nama  <span class="required">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$profils->email}}" id="email" name="email" class="form-control" required="required">
                                    @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label for="email">Email <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group{{ $errors->has('tlpn') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$profils->tlpn}}" id="tlpn" name="tlpn" class="form-control" required="required">
                                    @if ($errors->has('tlpn'))
                                    <span class="help-block">{{ $errors->first('tlpn') }}</span>
                                    @endif
                                    <label for="tlpn">Telepon <span class="required">*</span></label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group{{ $errors->has('lt') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$profils->lt}}" id="lt" name="lt" class="form-control" required="required">
                                    @if ($errors->has('lt'))
                                    <span class="help-block">{{ $errors->first('lt') }}</span>
                                    @endif
                                    <label for="lt">Latitude <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6 {{ $errors->has('lg') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$profils->lg}}"id="lg" name="lg" class="form-control" required="required">
                                    @if ($errors->has('lg'))
                                    <span class="help-block">{{ $errors->first('lg') }}</span>
                                    @endif 
                                    <label for="lg">Langitude <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-12 {{ $errors->has('alamat') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$profils->alamat}}"id="alamat" name="alamat" class="form-control" required="required">
                                    @if ($errors->has('alamat'))
                                    <span class="help-block">{{ $errors->first('alamat') }}</span>
                                    @endif 
                                    <label for="alamat">Alamat <span class="required">*</span></label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi">Deskripsi <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea id="deskripsi" class="form-control" rows="20" name="deskripsi">{{ old('deskripsi') ? old('deskripsi') : ($profils ? $profils->deskripsi : '') }}</textarea>
                            @if ($errors->has('deskripsi'))
                            <span class="help-block">{{ $errors->first('deskripsi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$profils->keterangan}}" id="keterangan" name="keterangan" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('keterangan'))
                            <span class="help-block">{{ $errors->first('keterangan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="PUT">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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
<script>
ClassicEditor
.create( document.querySelector( '#deskripsi' ) )
.catch( error => {
console.error( error );
} );
</script>
@endsection