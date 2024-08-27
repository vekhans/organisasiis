@extends('layouts.dasar.adhome')
@section('content')
<div class="box box-info">
    <div class="box-body">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <div class="x_panel">
                    <div class="x_title" style="justify-content: center;">
                        <h2>Konfirmasi Hapus data <a href="{{route('jenisarsip.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Kembali </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div style="justify-content: center;">
                         <p>Apakah anda yakin hapus  <strong>{{$jenisarsips->jenis}}</strong></p>
                         <p>Setelah terhapus data ini tidak bisa ditambahkan lagi</p>
                        <form method="POST" action="{{ route('jenisarsip.destroy',$jenisarsips->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger">Ya saya yakin Hapus!!!</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@stop
