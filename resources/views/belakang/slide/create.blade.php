@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Silde</h3>
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
                            <a href="{{route('slide.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Slide </a>
                            <i class="fa fa-fwfa-edit"></i> Tambah Data Slide 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('slide.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('slide.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('media') ? ' has-error' : '' }}">
                        <label for="media" class="col-md-2 control-label">Media</label>
                        <div class="col-md-6">
                            <input id="media" accept="image/*" type="file" class="form-control" name="media" value="{{ old('media') ? old('media') : '' }}" required>
                            @if ($errors->has('media'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('media') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <img id="img-preview" class="img-responsive" src="{{asset('media/slide/dem.jpg')}}" width="40%" height="40%" />
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">Caption</label>
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
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa faplus"></i>
                            Simpan</button>
                            <a href="{{route('slide.index')}}" class="btn btn-sm btn-warning">
                                <i class="fa fa-chevron-left"></i> Batal
                            </a>
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
    $("#media").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection