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
                            <i class="fa fa-table"></i> Data Cabang 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                            <a href="{{route('cabang.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead  text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>#</th>
                            <th>Nama Cabang</th>
                            <th>Kabupaten</th>
                            <th>Periode</th>
                            <th>Pembina</th>
                            <th>Ketua / Wakil Ketua</th>
                            <th>Sekretaris</th>
                            <th>Bendahara</th>
                            <th>Seksi Penerimaan</th>
                            <th>Seksi Kesehatan</th>
                            <th>Seksi Logistik</th>
                            <th>Seksi Penyegaran</th>
                            <th>Seksi Dokumentasi</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>#</th>
                            <th>Nama Cabang</th>
                            <th>Kabupaten</th>
                            <th>Periode</th>
                            <th>Pembina</th>
                            <th>Ketua / Wakil Ketua</th>
                            <th>Sekretaris</th>
                            <th>Bendahara</th>
                            <th>Seksi Penerimaan</th>
                            <th>Seksi Kesehatan</th>
                            <th>Seksi Logistik</th>
                            <th>Seksi Penyegaran</th>
                            <th>Seksi Dokumentasi</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($val->nama)}}</td>
                            <td>{{ ucfirst($val->cabangidkab->nama)}}</td>
                            <td>{{ ucfirst($val->periode)}}</td>
                            <td>{{ ucfirst($val->cabangpembina->nama)}}</td>
                            <td>
                                <p>{{ ucfirst($val->cabangketua->nama)}} </p>
                                <p>{{ ucfirst($val->cabangwakilketua->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangsek1->nama)}}</p>
                                <p>{{ ucfirst($val->cabangsek2->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangbend1->nama)}}</p>
                                <p>{{ ucfirst($val->cabangbend2->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangkasekpenerimaan->nama)}}</p>
                                <p>{{ ucfirst($val->cabangseksekpenerimaan->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangkasekkesehatan->nama)}}</p>
                                <p>{{ ucfirst($val->cabangseksekkesehatan->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangkaseklogistik->nama)}}</p>
                                <p>{{ ucfirst($val->cabangsekseklogistik->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangkasekpenyegaran->nama)}}</p>
                                <p>{{ ucfirst($val->cabangseksekpenyegaran->nama)}}</p></td>
                            <td><p>{{ ucfirst($val->cabangkasekdokumentasi->nama)}}</p>
                                <p>{{ ucfirst($val->cabangseksekdokumentasi->nama)}}</p></td>
                            <td class="text-center">
                                <form class="formDelete" action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                    <div class="form-group">
                                        <a href="{{ route('anggotacabang.index', $val->id) }}"  class="btn btn-sm btn-primary"><i class="fa fa-table" title="Anggota"></i> Anggota</a>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('cabang.edit', $val->id) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah"></i> Ubah</a>   
                                       
                                        <a href="{{ route('cabang.show',$val->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" title="Hapus"></i>  Hapus </a> 
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" class="text-center">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
