@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Video</h3>
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
                            <a href="{{route('video.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Video</a>
                            <i class="fa fa-fw fa-edit"></i> Tambah Data 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('video.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('video.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5 form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                            <label class="control-label" for="caption">Caption <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('caption') ?: '' }}" id="caption" name="caption" class="form-control">
                                @if ($errors->has('caption'))
                                <span class="help-block">{{ $errors->first('caption') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label class="control-label" for="file">File <span class="required">*</span>
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('file') ?: '' }}" id="file" name="file" class="form-control">
                                @if ($errors->has('file'))
                                <span class="help-block">{{ $errors->first('file') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 form-group{{ $errors->has('sumber') ? ' has-error' : '' }}">
                            <label class="control-label" for="sumber"> Sumber
                            </label>
                            <div>
                                <input type="text" value="{{ Request::old('sumber') ?: '' }}" id="sumber" name="sumber" class="form-control">
                                @if ($errors->has('sumber'))
                                <span class="help-block">{{ $errors->first('sumber') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan </button> 
                            <a href="{{route('video.index')}}" class="btn btn-info "><i class="fa fa-chevron-left"></i> Kembali </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
