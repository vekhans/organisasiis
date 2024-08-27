@extends('layouts.dasar.adhome')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <h3>Manajemen Data Profil Anggota </h3>
        <hr/>
        <div class="clearfix"></div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="form-group">
                    <div class="form-row">
                        <div style="text-align: left;"> 
                            <a href="{{route('home')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>

                            <a href="{{route('profil.index')}}" class="active"><i class="fa fa-fw fa-tachometer-alt"></i> Data Anggota</a>

                        </div>  
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6" style="text-align: left;"> 
                        <div>
                            <p><strong> Nama           : </strong> {{ucfirst($anggotas->nama)}} </p>
                            <p><strong> Email          : </strong> {{($anggotas->email)}} </p>
                            <p><strong> Telepon        : </strong> {{($anggotas->tlpn)}} </p>
                            <p><strong> Alamat         : </strong> {{($anggotas->alamat)}} </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-offset-3 text-center">
                            <img id="img-preview" class="img-responsive" style="border-radius: 20%;" alt="User Image" src="{{asset($anggotas->file)}}" width="50%" height="35%" />
                        </div>
                        <br>
                        
                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="col-md-12" style="text-align: left;"> 
                        <div>
                            <p><strong> DESKRIPSI      : </strong>  </p>
                            <P>
                                 
                            </P>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection