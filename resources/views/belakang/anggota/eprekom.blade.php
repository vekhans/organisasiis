@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Rekomendasi Cabang  
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
                            <a href="{{route('anggota.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Rekomendasi Cabang </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah Rekomendasi Cabang</a>  
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
                    <form method="post" action="{{ route('uprekom', $rekomcabang->id) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                       <div class="col-md-6 {{ $errors->has('no_rekomcabang') ? ' has-error' : '' }}">
                                <label class="control-label col-md-6 col-sm-6 col-xs-6" for="no_rekomcabang">No. Rekom. Cabang<span class="required">*</span>
                                </label>
                                <div>
                                    <input type="text" value="{{$rekomcabang->no_rekomcabang}}" id="no_rekomcabang" name="no_rekomcabang" class="form-control">
                                    @if ($errors->has('no_rekomcabang'))
                                    <span class="help-block">{{ $errors->first('no_rekomcabang') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 form-group{{ $errors->has('tanggal_rekomcabang') ? ' has-error' : '' }}">
                        <label for="tanggal_rekomcabang" class="control-label">Tanggal Rekom. cabang <span class="required">*</span></label>
                        <div>
                            <input type="date" name="tanggal_rekomcabang" value="{{$rekomcabang->tanggal_rekomcabang}}" id="tanggal_rekomcabang"  class="form-control" onkeyup="tanggal_rekomcabang();" /> 
                            @if ($errors->has('tanggal_rekomcabang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_rekomcabang') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 

                             

                       <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-2 control-label">File Rekom. Cabang</label>
                        <div class="col-md-10">
                            <input id="file" accept="
                                application/pdf,
                                application/msword,
                                application/vnd.ms-excel,
                                application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                                application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            type="file" class="form-control" name="file" value="{{ old('file') ? old('file') : '' }}">

                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
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
  $('#tanggal_rekomcabang').datepicker();
});
     
</script>
@endsection 
@stop 
