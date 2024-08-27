@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Cabang</h3>
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
                            <a href="{{route('cabang.index')}}" class="active"><i class="fa fa-fw fa-table"></i>Data Cabang </a>
                            <i class="fa fa-fw fa-edit"></i> Tambah Data Cabang 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('cabang.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('cabang.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="col-md-4 form-group {{ $errors->has('id_kabupaten') ? ' has-error' : '' }}">
                        <label class="control-label" for="id_kabupaten" <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="id_kabupaten" name="id_kabupaten">
                                @if(count($kabupaten))
                                @foreach($kabupaten as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('id_kabupaten'))
                            <span class="help-block">{{ $errors->first('id_kabupaten') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="" id="nama" name="nama" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('nama'))
                            <span class="help-block">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('periode') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="periode">Periode<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="" id="periode" name="periode" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('periode'))
                            <span class="help-block">{{ $errors->first('periode') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('pembina') ? ' has-error' : '' }}">
                        <label class="control-label" for="pembina">Pembina Cabang <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="pembina" name="pembina">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('pembina'))
                            <span class="help-block">{{ $errors->first('pembina') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('ketua') ? ' has-error' : '' }}">
                        <label class="control-label" for="ketua">Ketua Cabang <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="ketua" name="ketua">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('ketua'))
                            <span class="help-block">{{ $errors->first('ketua') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('wakil_ketua') ? ' has-error' : '' }}">
                        <label class="control-label" for="wakil_ketua">Wakil Ketua <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="wakil_ketua" name="wakil_ketua">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('wakil_ketua'))
                            <span class="help-block">{{ $errors->first('wakil_ketua') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('sekretaris_1') ? ' has-error' : '' }}">
                        <label class="control-label" for="sekretaris_1">Sekretaris 1 <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="sekretaris_1" name="sekretaris_1">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('sekretaris_1'))
                            <span class="help-block">{{ $errors->first('sekretaris_1') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('sekretaris_2') ? ' has-error' : '' }}">
                        <label class="control-label" for="sekretaris_2">Sekretaris 2 <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="sekretaris_2" name="sekretaris_2">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('sekretaris_2'))
                            <span class="help-block">{{ $errors->first('sekretaris_2') }}</span>
                            @endif
                        </div>
                    </div>
                     <div class="col-md-4 form-group{{ $errors->has('bendahara_1') ? ' has-error' : '' }}">
                        <label class="control-label" for="bendahara_1">Bendahara 1 <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="bendahara_1" name="bendahara_1">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('bendahara_1'))
                            <span class="help-block">{{ $errors->first('bendahara_1') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('bendahara_2') ? ' has-error' : '' }}">
                        <label class="control-label" for="bendahara_2">Bendahara 2 <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="bendahara_2" name="bendahara_2">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('bendahara_2'))
                            <span class="help-block">{{ $errors->first('bendahara_2') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('kasek_penerimaan') ? ' has-error' : '' }}">
                        <label class="control-label" for="kasek_penerimaan">Ketua Seksi Penerimaan <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="kasek_penerimaan" name="kasek_penerimaan">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('kasek_penerimaan'))
                            <span class="help-block">{{ $errors->first('kasek_penerimaan') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('seksek_penerimaan') ? ' has-error' : '' }}">
                        <label class="control-label" for="seksek_penerimaan">Sekretaris Seksi Penerimaan <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="seksek_penerimaan" name="seksek_penerimaan">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('seksek_penerimaan'))
                            <span class="help-block">{{ $errors->first('seksek_penerimaan') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('kasek_kesehatan') ? ' has-error' : '' }}">
                        <label class="control-label" for="kasek_kesehatan">Ketua Seksi Kesehatan <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="kasek_kesehatan" name="kasek_kesehatan">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('kasek_kesehatan'))
                            <span class="help-block">{{ $errors->first('kasek_kesehatan') }}</span>
                            @endif
                        </div>
                    </div>
                     <div class="col-md-4 form-group{{ $errors->has('seksek_kesehatan') ? ' has-error' : '' }}">
                        <label class="control-label" for="seksek_kesehatan">Sekretaris Seksi Kesehatan <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="seksek_kesehatan" name="seksek_kesehatan">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('seksek_kesehatan'))
                            <span class="help-block">{{ $errors->first('seksek_kesehatan') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('kasek_logistik') ? ' has-error' : '' }}">
                        <label class="control-label" for="kasek_logistik">Ketua Seksi Logistik <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="kasek_logistik" name="kasek_logistik">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('kasek_logistik'))
                            <span class="help-block">{{ $errors->first('kasek_logistik') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('seksek_logistik') ? ' has-error' : '' }}">
                        <label class="control-label" for="seksek_logistik">Sekretaris Seksi Logistik <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="seksek_logistik" name="seksek_logistik">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('seksek_logistik'))
                            <span class="help-block">{{ $errors->first('seksek_logistik') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('kasek_penyegaran') ? ' has-error' : '' }}">
                        <label class="control-label" for="kasek_penyegaran">Ketua Seksi Penyegaran <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="kasek_penyegaran" name="kasek_penyegaran">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('kasek_penyegaran'))
                            <span class="help-block">{{ $errors->first('kasek_penyegaran') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('seksek_penyegaran') ? ' has-error' : '' }}">
                        <label class="control-label" for="seksek_penyegaran">Sekretaris Seksi Penyegaran <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="seksek_penyegaran" name="seksek_penyegaran">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('seksek_penyegaran'))
                            <span class="help-block">{{ $errors->first('seksek_penyegaran') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('kasek_dokumentasi') ? ' has-error' : '' }}">
                        <label class="control-label" for="kasek_dokumentasi">Ketua Seksi Dokumentasi <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="kasek_dokumentasi" name="kasek_dokumentasi">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('kasek_dokumentasi'))
                            <span class="help-block">{{ $errors->first('kasek_dokumentasi') }}</span>
                            @endif
                        </div>
                    </div>

                     <div class="col-md-4 form-group{{ $errors->has('seksek_dokumentasi') ? ' has-error' : '' }}">
                        <label class="control-label" for="seksek_dokumentasi">Sekretaris Seksi Dokumentasi <span class="required">*</span>
                        </label>
                        <div>
                            <select class="form-control" id="seksek_dokumentasi" name="seksek_dokumentasi">
                                 
                                @foreach($anggota as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                 
                            </select>
                            @if ($errors->has('seksek_dokumentasi'))
                            <span class="help-block">{{ $errors->first('seksek_dokumentasi') }}</span>
                            @endif
                        </div>
                    </div>


 

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan </button> 
                            <a href="{{route('cabang.index')}}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
    $('#tanggal_pelantikan').datepicker({
       dateFormat: 'yy/mm/dd',
    });
        });    
    });

      
</script>
@endsection
 