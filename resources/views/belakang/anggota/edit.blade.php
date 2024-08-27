 @extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Anggota  
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
                            <a href="{{route('anggota.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Anggota </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah Anggota</a>  
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
                    <form method="post" action="{{ route('anggota.update', $anggotas->id) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label class="control-label col-md-6 col-sm-6 col-xs-6" for="nama">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$anggotas->nama}}" id="nama" name="nama" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('nama'))
                            <span class="help-block">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                        <label class="control-label col-md-6 col-sm-6 col-xs-6" for="nik">N.I.K<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$anggotas->nik}}" id="nik" name="nik" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('nik'))
                            <span class="help-block">{{ $errors->first('nik') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nokta') ? ' has-error' : '' }}">
                        <label class="control-label col-md-6 col-sm-6 col-xs-6" for="nokta">No. KTA<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$anggotas->nokta}}" id="nokta" name="nokta" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('nokta'))
                            <span class="help-block">{{ $errors->first('nokta') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-6 col-sm-6 col-xs-6" for="email">E-mail <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{$anggotas->email}}" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="alamat">Alamat<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$anggotas->alamat}}" id="alamat" name="alamat" class="form-control">
                            @if ($errors->has('alamat'))
                            <span class="help-block">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5 form-group{{ $errors->has('tlpn') ? ' has-error' : '' }}">
                            <label class="control-label col-md-6 col-sm-6 col-xs-6" for="tlpn">Telepon <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{$anggotas->tlpn}}" id="tlpn" name="tlpn" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('tlpn'))
                                <span class="help-block">{{ $errors->first('tlpn') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-5 form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}"  >
                            <label for="jenis_kelamin" class="control-label col-md-6 col-sm-6 col-xs-6">Jenis Kelamin</label>
                            <div>
                                <select class="form-control col-md-7 col-xs-12" name="jenis_kelamin" id="jenis_kelamin">
                                    @foreach($jenis_kelamin as $v)
                                    <option value="{{ $v }}" {{$anggotas->jenis_kelamin == $v ? 'selected="selected"' : ''}}> {{ $v}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                    <div class="col-md-5 form-group{{ $errors->has('agama') ? ' has-error' : '' }}"  >
                            <label for="agama" class="control-label col-md-6 col-sm-6 col-xs-6">Agama</label>
                            <div>
                                <select class="form-control col-md-7 col-xs-12" name="agama" id="agama">
                                    @foreach($agama as $v)
                                    <option value="{{ $v }}" {{$anggotas->agama == $v ? 'selected="selected"' : ''}}> {{ $v}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('agama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4 form-group{{ $errors->has('id_desa') ? ' has-error' : '' }}">
                                <label class="control-label col-md-6 col-sm-6 col-xs-6" for="id_desa"> Desa <span class="required">*</span>
                                </label>
                                <div>
                                    <select class="form-control col-md-7 col-xs-12" id="id_desa" name="id_desa">
                                        @if(count($desa))
                                        @foreach($desa as $row)
                                        <option value="{{$row}}" {{$row->id == $anggotas->id_desa ? 'selected="selected"' : ''}}>{{$row->nama}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('id_desa'))
                                    <span class="help-block">{{ $errors->first('id_desa') }}</span>
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
                            <img id="img-preview" class="img-responsive" src="{{asset($anggotas->file)}}" width="50%" height="35%" />
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
