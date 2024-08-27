@extends('layouts.dasar.adhome')
@section('content')
<style type="text/css">
    .input-group-append {
  cursor: pointer;
}
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Pernikahan  
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
                            <a href="{{route('anggota.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Akta Pernikahan </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah Akta Pernikahan</a>  
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('anggota.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="x_content">
                    <br />
                    <form action="{{ route('uppernikahan', $pernikahan->id) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="col-md-6 {{ $errors->has('no_aktanikah') ? ' has-error' : '' }}">
                            <label class="control-label col-md-6 col-sm-6 col-xs-6" for="no_aktanikah">No. Atka Nikah<span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{$pernikahan->no_aktanikah}}" id="no_aktanikah" name="no_aktanikah" class="form-control">
                                @if ($errors->has('no_aktanikah'))
                                <span class="help-block">{{ $errors->first('no_aktanikah') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 form-group{{ $errors->has('tanggal_aktanikah') ? ' has-error' : '' }}">
                            <label for="tanggal_aktanikah" class="control-label">Tanggal Aktanikah <span class="required">*</span></label>
                            <div>
                                <input type="date" name="tanggal_aktanikah" value="{{$pernikahan->tanggal_aktanikah}}" id="tanggal_aktanikah"  class="form-control" onkeyup="tanggal_aktanikah();" /> 
                                @if ($errors->has('tanggal_aktanikah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_aktanikah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <!-- <section class="container">
                          <h2 class="py-2">Datepicker in Bootstrap 5 kaaa</h2>
                          <form class="row">
                            <label for="tanggal_aktanikah" class="col-1 col-form-label">Date</label>
                            <div class="col-5">
                              <div class="input-group tanggal_aktanikah" id="datepicker">
                                <input type="text" value="{{$pernikahan->tanggal_aktanikah}}" class="form-control" id="tanggal_aktanikah"/>
                                <span class="input-group-append">
                                  <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                </span>
                              </div>
                            </div>
                          </form>
                        </section> -->
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-2 control-label">File Akta Pernikahan</label>
                            <div class="col-md-10">
                                <input id="file" accept="
                                application/pdf,
                                application/msword,
                                application/vnd.ms-excel,
                                application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                                application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                type="file" class="form-control" name="file" value="{{$pernikahan->file}}" >
                                @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Simpan</button>
                                <a href="{{route('anggota.index')}}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
      $("#file").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
        }
      });

$(function(){
  $('#tanggal_aktanikah').datepicker();
});


</script>
@endsection 
@stop 
