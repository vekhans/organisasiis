 @extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Jenis Berita 
            <strong>{{$jenisberitas->jenis}}
            </strong>
        </h3>
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
                            <a href="{{route('jenisberita.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Jenis Berita </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah Jenis Berita</a>  
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('jenisberita.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('jenisberita.update', $jenisberitas->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                         {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis">Nama Jenis <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$jenisberitas->jenis}}" id="jenis" name="jenis" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('jenis'))
                            <span class="help-block">{{ $errors->first('jenis') }}</span>
                            @endif
                        </div>
                        </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Simpan</button>
                                <a href="{{route('jenisberita.index')}}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a> 
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection
