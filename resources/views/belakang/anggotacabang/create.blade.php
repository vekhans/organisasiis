@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Anggota Cabang</h3>
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
                            <a href="{{route('cabang.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Provinsi </a>
                            <a href="{{route('anggotacabang.index',$cabang->id)}}" class="active"><i class="fa fa-fw fa-table"></i>Data Anggota Cabang <strong>{{$cabang->nama}}
            </strong></a>
                            <i class="fa fa-fw fa-edit"></i> Tambah Data Anggota Cabang 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('anggotacabang.index',$cabang->id)}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('anggotacabang.store', [$cabang->id,]) }}" data-parsley-validate class="form-horizontal form-label-left" >
                    {{ csrf_field() }}
                    
                    <div class="col-md-4 form-group{{ $errors->has('id_anggota') ? ' has-error' : '' }}">
                        <label class="control-label" for="id_anggota">Anggota Cabang <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="id_anggota" name="id_anggota">
                                @if(count($anggota))
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('id_anggota'))
                            <span class="help-block">{{ $errors->first('id_anggota') }}</span>
                            @endif
                        </div>
                    </div>
                     
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan </button> 
                            <a href="{{route('anggotacabang.index', $cabang->id)}}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
