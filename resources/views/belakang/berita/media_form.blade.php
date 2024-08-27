@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Media Berita {!!' <strong>'.$media_berita->judul.'</strong>'!!}</h3>
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
                            <a href="{{ route('berita.index') }}"><i class="fas fa-fw fa-table -alt"> </i> Berita</a>
                            <a><i class="fas fa-fw fa-edit"></i> Tambah Media Berita</a>
                        </div> 
                        <div class="col-md-3" style="text-align: right;">  
                            <a href="{{ route('meber.index',[$media_berita->id,'id'=>null]) }}" style="text-align: right;" class="btn btn-sm btn-info pull-rigth"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('meber.store',[$media_berita->id,'id'=>null]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}" hidden="true">
                        <label for="jenis" class="col-md-2 control-label">Jenis Media</label>
                        <div class="col-md-2">
                            <select class="form-control" name="jenis" id="jenis">
                                @foreach($jenis as $k => $v)
                                <option value="{{ $v }}" {{ (old('jenis')) && old('jenis') == $v ? 'selected' : '' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('jenis'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jenis') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id='media-group' {!! (old('jenis')) && (old('jenis') != 'foto') ? ' style="display: none;"' : '' !!} class="form-group{{ $errors->has('media') ? ' has-error' : '' }}">
                        <label for="media" class="col-md-2 control-label">Media</label>
                        <div class="col-md-6">
                            <input id="media" accept="image/*" type="file" class="form-control" name="media" value="{{ old('media') ? old('media') : '' }}">
                            @if ($errors->has('media'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('media') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id='link-group' {!! (old('jenis') == null) || (old('jenis') != 'video') ? ' style="display: none;"' : '' !!} class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link" class="col-md-2 control-label">Link</label>
                        <div class="col-md-6">
                            <input id="link" type="text" class="form-control" name="link" value="{{ old('link') ? old('link') : '' }}">
                            @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <img id="img-preview" class="img-responsive" src="{{asset('media/slide/dem.jpg')}}" width="40%" height="40%"   />
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">Caption/Judul</label>
                        <div class="col-md-6">
                            <input id="caption" type="text" class="form-control" name="caption" value="{{ old('caption') ? old('caption') : '' }}" required>
                            @if ($errors->has('caption'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('caption') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('sumber') ? ' has-error' : '' }}">
                        <label for="sumber" class="col-md-2 control-label">Sumber</label>
                        <div class="col-md-6">
                            <input id="sumber" type="text" class="form-control" name="sumber" value="{{ old('sumber') ? old('sumber') : '' }}">
                            @if ($errors->has('sumber'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sumber') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2">
                            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Simpan</button>
                            <a href="{{route('meber.index',$media_berita->id)}}" class="btn btn-warning"><i class="fa fa-fw fa-arrow-left"></i> Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $("#media").change (function(e) {
        if($('#jenis').val() == 'foto') {
            var fileInput=this;
            if (fileInput.files[0]) {
                var reader=new FileReader();
                reader.onload=function(e) 
                {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        }else{
            $('#img-preview').attr('src','').hide();
        }
    });
    $("#jenis").change(function() {
        if($(this).val() == 'foto') {
            $('#media-group').show();           
            $('#img-preview').show(); 
            $('#link-group').hide();
            $('#link').val('');
            $('#img-preview').attr('src="{{asset('media/slide/dem.jpg')}}"','').show();
        }else{
            $('#link-group').show();
            $('#link').val('');
            $('#media-group').hide();
            $('#img-preview').attr('src','').hide();
            $('#media').val('');
        }
    });
</script>
@endsection