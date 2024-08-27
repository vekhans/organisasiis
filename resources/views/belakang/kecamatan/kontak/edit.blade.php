 @extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Kontak</h3>
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
                            <a href="{{route('kontak.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Kontak </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah Kontak/Pesan</a>  
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('kontak.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="x_content">
                    <br/>
                    <form method="post" action="{{ route('kontak.update',$kontak->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">

                        <div class="col-md-6 form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama">Nama <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{$kontak->nama}}" id="nama" name="nama" class="form-control">
                                @if ($errors->has('nama'))
                                <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">e-mail <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{$kontak->email}}" id="email" name="email" class="form-control">
                                @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">

                        <div class="col-md-6 form-group{{ $errors->has('perihal') ? ' has-error' : '' }}">
                            <label for="perihal">perihal <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{$kontak->perihal}}" id="perihal" name="perihal" class="form-control">
                                @if ($errors->has('perihal'))
                                <span class="help-block">{{ $errors->first('perihal') }}</span>
                                @endif
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                        <div class="col-md-12 form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
                            <label for="komentar">Komentar <span class="required">*</span>
                            </label>
                            <div>
                                <textarea id="komentar" class="form-control" rows="8" name="komentar">{{ old('komentar') ? old('komentar') : ($kontak ? $kontak->komentar : '') }}</textarea>
                                @if ($errors->has('komentar'))
                                <span class="help-block">{{ $errors->first('komentar') }}</span>
                                @endif
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Simpan</button>
                                <a href="{{route('kontak.index')}}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
