@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data User / Pengguna</h3>
        <hr/>
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>
                            <i class="fa fa-table"></i> Data Pengguna 
                        </div>  
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6" style="text-align: left;"> 
                        <div>
                            <p><strong> Nama           : </strong> {{ucfirst($admin->name)}} </p>
                            <p><strong> Nama Lengkap   : </strong> {{($admin->lengkap)}} </p>
                            <p><strong> Email          : </strong> {{($admin->email)}} </p>
                            <p><strong> Telepon        : </strong> {{($admin->tlpn)}} </p>
                            <p><strong> Alamat         : </strong> {{($admin->alamat)}} </p>
                            <p><strong> Posisi         : </strong> {{($admin->posisi)}} </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-offset-3 text-center">
                            <img id="img-preview" class="img-responsive" style="border-radius: 20%;" alt="User Image" src="{{asset($admin->file)}}" width="50%" height="35%" />
                        </div>
                        <br>
                        <p class="text-center">
                            <a href="{{ route('eprof', $admin->id) }}" class="btn btn-warning btn-sm text-center"><i class="fa fa-fw fa-edit" title="Ubah"></i> Ubah</a>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12" style="text-align: left;"> 
                        <div>
                            <p><strong> DESKRIPSI      : </strong>  </p>
                            <P>
                                {{($admin->deskripsi)}}
                            </P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection