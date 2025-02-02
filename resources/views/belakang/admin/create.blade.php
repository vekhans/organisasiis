@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Admin</h3>
        <hr/>
        @if(session('status'))
          <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>{{session('status')}}</strong>
          </div>
        @endif 
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9" style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <a href="{{route('admin.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Admin</a>
                            <i class="fa fa-fw fa-edit"></i> Tambah Data 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('admin.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label" for="name">Nama <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 form-group{{ $errors->has('lengkap') ? ' has-error' : '' }}">
                            <label class="control-label" for="lengkap">Nama Lengkap <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('lengkap') ?: '' }}" id="lengkap" name="lengkap" class="form-control">
                                @if ($errors->has('lengkap'))
                                <span class="help-block">{{ $errors->first('lengkap') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-5 form-group{{ $errors->has('tlpn') ? ' has-error' : '' }}">
                            <label class="control-label" for="tlpn">Telepon <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('tlpn') ?: '' }}" id="tlpn" name="tlpn" class="form-control">
                                @if ($errors->has('tlpn'))
                                <span class="help-block">{{ $errors->first('tlpn') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label" for="email">E-mail <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="" id="email" name="email" class="form-control">
                                @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label" for="last-name">Password <span class="required">*</span>
                            </label>
                            <div>
                                <input type="password" value="{{ Request::old('password') ?: '' }}" id="password" name="password" class="form-control">
                                @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="password-confirm" class="control-label">Konfirmasi Password <span class="required">*</span>
                            </label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>                        
                        
                        <div class="col-md-5 form-group{{ $errors->has('posisi') ? ' has-error' : '' }}"  >
                            <label for="posisi" class="control-label">Jenis Admin</label>
                            <div>
                                @if ($errors->has('posisi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('posisi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input id="aturan" type="text" class="form-control" name="aturan"  value="itam" hidden="true"> 
                        <div class="col-md-10 form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label class="control-label" for="alamat">Alamat <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('alamat') ?: '' }}" id="alamat" name="alamat" class="form-control">
                                @if ($errors->has('alamat'))
                                <span class="help-block">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8 form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                        <label for="deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                        <div>
                            <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') ? old('deskripsi') : '' }}"></textarea>

                            @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                                            
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
		                    <img id="img-preview" class="img-responsive" src="{{asset('media/veky.png')}}" width="50%" height="35%" />
		                </div>
		            </div>  
		            <div class="ln_solid"></div>
		            <div class="form-group">
		                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		                    <input type="hidden" name="_token" value="{{ Session::token() }}">
		                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan </button> 
		                    <a href="{{route('admin.index')}}" class="btn btn-info "><i class="fa fa-chevron-left"></i> Kembali </a>
		                </div>
		            </div>
                    
<p id="demo"></p>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
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
        }else if($(this).val() == 'Canbang') {
            $('#aturan').val('kuning'); 
        }else{
            $('#aturan').val('itam');
        }
    });

 function myFunction() {
  var x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;
} 
     
</script>
@endsection
 