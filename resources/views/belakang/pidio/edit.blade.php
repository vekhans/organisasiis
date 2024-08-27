 @extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Video : 
            <strong>{{$pidios->caption}}
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
                            <a href="{{route('video.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Video </a>
                            <a><i class="fas fa-fw fa-edit"></i> Ubah </a>  
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('video.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('video.update',$pidios->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                     
                    <div class="form-group">
                        <div class="form-row">
                             
                             
                            <div class="col-md-6 form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$pidios->caption}}" id="caption" name="caption" class="form-control" required="required">
                                    @if ($errors->has('caption'))
                                    <span class="help-block">{{ $errors->first('caption') }}</span>
                                    @endif
                                    <label for="caption">Caption <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$pidios->file}}" id="file" name="file" class="form-control" required="required">
                                    @if ($errors->has('file'))
                                    <span class="help-block">{{ $errors->first('file') }}</span>
                                    @endif
                                    <label for="file">File <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6 {{ $errors->has('sumber') ? ' has-error' : '' }}">
                                <div class="form-label-group">
                                    <input type="text" value="{{$pidios->sumber}}"id="sumber" name="sumber" class="form-control" required="required">
                                    @if ($errors->has('sumber'))
                                    <span class="help-block">{{ $errors->first('sumber') }}</span>
                                    @endif 
                                    <label for="sumber">Sumber <span class="required"></span></label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="PUT">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-fw fa-plus -alt"></i> Simpan</button>
                            <a href="{{route('video.index')}}" class="btn btn-warning"><i class="fa fa-fw fa-arrow-left -alt"></i>  Batal</a>

                        </div>

                    </div>
                </form>
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection
