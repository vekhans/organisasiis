@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Logo  
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
                            <a href="{{route('profil.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Anggota </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah Anggota</a>  
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('profil.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('uplogo', $profils->id) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                       <div class="col-md-8 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="control-label">File / Foto</label>
                        <div>
                            <!--<img src="" id="img" class="img-responsive" width="40%" height="40%" style="height: 160px; width: 140px;" /> -->
                            <input id="file" accept="image/*" type="file" class="form-control" name="file" value="{{ old('file') ? old('file') : '' }}">
                            @if ($errors->has('file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-2">
                            <img id="img-preview" class="img-responsive" src="{{asset($profils->file)}}" width="50%" height="35%" />
                        </div>
                    </div> 



                         <div class="ln_solid"></div>
                         <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Simpan</button>
                                <a href="{{route('profil.index')}}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a> 
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
      $("#posisi").change(function() {
        if($(this).val() == 'Admin') {
            $('#aturan').val('ijo');
        }else if($(this).val() == 'Redaksi') {
            $('#aturan').val('kuning');
        }else if($(this).val() == 'Wartawan') {
            $('#aturan').val('mera');
        }else{
            $('#aturan').val('itam');
        }
    });
</script>
@endsection 
@stop 
