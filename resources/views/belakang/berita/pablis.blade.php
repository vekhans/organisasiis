@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Berita Publish</h3>
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
                            <i class="fa fa-table"></i> Data Berita 
                        </div> 
                        <div class="col-md-3" style="text-align: right;"> 
                           <!--  <a href="" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table-responsive table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>ID </th>
                            <th>Judul - Deskripsi</th> 
                            <th>Admin Create / Publish</th> 
                        </tr>
                    </thead>
                    <tfoot class="thead text-center" style="background-color: #009; color: white;">
                        <tr>
                            <th>ID </th>
                            <th>Judul - Deskripsi</th> 
                            <th>Admin Create / Publish</th>  
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($data as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td>
                                <strong> 
                                    <a href="{{ route('adeber',['id'=>$val->id,'slug'=>str_slug($val->judul)]) }}">{{ ucwords($val->judul)}} </a>
                                </strong>
                                <hr>
                                <strong class=""> Status : </strong>
                                {{ucwords($val->publish) }}
                                <a href=""  class="btn btn-sm btn-success float-right"><i class="fa fa-fw fa-file" title="Ubah"></i> PDF</a>
                                <hr>
                                <strong> 
                                    Jenis : 
                                </strong>
                                {{ucwords($val->jenis_berita->jenis) }}
                                <hr>
                                <strong>Deskripsi :</strong> 
                                <p>{!!substr(strip_tags($val->deskripsi),0,900)!!}...
                                </p>
                                <hr>
                                <strong>Keterangan :</strong> 
                                <p>
                                {!!substr(strip_tags($val->keterangan),0,20)!!}...
                                </p>
                                <hr>
                                <strong>Total Lihat /Baca : </strong>  <span class="hidden-xs">{{ucfirst($val->visit_count)}}</span>
                                <strong>Total Komentar : </strong>   <span class="hidden-xs">{{ucfirst($val->comment_count)}}</span>
                                <strong>Total Rating : </strong>   <span class="hidden-xs">{{ucfirst($val->rating)}}</span>
                            </td> 
                            <td>
                                <strong>{{ucfirst($val->admina->name)}}</strong> <hr> <span class="hidden-xs">{{$val->created_at}}</span>
                                <hr>
                                <strong>{{ucfirst($val->admin->name)}}</strong> <hr> <span class="hidden-xs">{{$val->publish_at}}</span>
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
