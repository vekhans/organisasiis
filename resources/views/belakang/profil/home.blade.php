@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Profil</h3>
        <hr/>
        @if(session('status'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>{{session('status')}}</strong>
        </div>
        @endif
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div  class="col-md-12" style="text-align: left;"> 
                    <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                    <i class="fa fa-table"></i> Data Profil
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @forelse($data as $val)
                        <thead class="thead text-center" style="background-color: #009; color: white;">
                            <tr>
                                <th> 
                                   <h5>
                                   {{ ucwords($val->nama)}}
                                   </h5>
                               </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('mepro.index', $val->id) }}" class="btn btn-sm btn-info"><i class="fa fa-plus" title="Media"></i> Media</a>
                                    <a href="{{ route('profil.edit',[$val->id]) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah"></i> Ubah</a>
                                    <a href="{{ route('elogo',[$val->id]) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah Logo"></i> Logo</a>
                                    <a href="{{ route('estruktur',[$val->id]) }}"  class="btn btn-sm btn-warning"><i class="fa fa-edit" title="Ubah Struktur"></i> Struktur</a>
                                    <hr>
                                    <strong>Telepon : </strong>{{ ucwords($val->tlpn) }} 
                                    <hr>
                                    <strong>Email : </strong>
                                    {{($val->email) }} 
                                    <hr>
                                    <strong>Alamat : </strong> <p>
                                    {{ ucwords($val->alamat) }} </p>
                                    <hr>
                                    <strong>Deskripsi :</strong>
                                    <hr>
                                    {!! ($val->deskripsi)!!}...
                                    <hr>
                                    <strong>Logo :</strong>
                                    <hr>
                                    <div class="text-center">
                                        <img id="img-preview" src="{{ asset($val->file) }}" class="img-responsive" width="50%" height="35%" alt="foto Logo">
                                    </div>
                                    <strong>Struktur :</strong>
                                    <hr>
                                    <div class="text-center">
                                        <img id="img-preview" src="{{ asset($val->struktur) }}" class="img-responsive" width="50%" height="35%" alt="foto Struktur">
                                    </div>
                                    <hr>
                                    <strong>Keterangan :</strong>
                                    <p>
                                        {!! ($val->keterangan)!!}...
                                    </p>
                                </td>
                            </tr> 
                        </tbody>

                            @empty
                            <tr>
                                <td colspan="15" class="text-center">Tidak Ada Data</td>
                            </tr>
                            
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
