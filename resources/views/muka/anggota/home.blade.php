

@extends('layouts.temp.ednes')
@section('content')
<section class="ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <ol class="breadcrumb">
                        <a href="{{ route('beranda') }}"><i class="mr-5 ion-ios-home"></i><b>BERANDA</b></a>
                        <a class="color-ash" href=""><i class="mlr-10 ion-chevron-right"></i><b>Cari Anggota</b></a>
                </ol>                 
                <div class="p-30 mb-30 card-view">
                    <div class="card bg-info text-white mb-4">
                        <h6><button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type=""><b>Jumlah Anggota {{$jumlah_anggota}}</b></button></h6>
                    </div>
                </div>
                <div class="p-30 mb-30 card-view">
                    <div class="card bg-warning text-white mb-4">
                        <h6><button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type=""><b>Jumlah Cabang {{$jumlah_cabang}}</b></button></h6>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead text-center" style="background-color: #009; color: white">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIK / No. KTA</th>
                                <th>Alamat / Telepon</th>
                                <th>Agama / Jenis Kelamin</th>
                                <th>Foto</th>
                                <th>Status Keaktifan</th>
                                
                            </tr>
                        </thead>
                        <tfoot class="thead text-center" style="background-color: #009; color: white">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIK / No. KTA</th>
                                <th>Alamat / Telepon</th>
                                <th>Agama / Jenis Kelamin</th>
                                <th>Foto</th>
                                <th>Status Keaktifan</th>
                                 
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($data as $val)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>

                                    <a href="{{ route('profilsanggota', $val->id) }}"> 
                                        {{ ucfirst($val->nama)}}</a>



                                </td>
                                <td><p>NIK : {{ ucfirst($val->nik)}} </p> 
                                    No. KTA : {{ ucfirst($val->nokta)}}</td>
                                <td><p>Alamat : {{ ucfirst($val->alamat)}}</p> 
                                    Telepon : {{ ucfirst($val->tlpn)}}</td>
                                <td><p>Agama : {{ ucfirst($val->agama)}}</p>
                                    Jenis Kelamin : {{ ucfirst($val->jenis_kelamin)}}
                                </td>
                                <td>
                                    <div class="text-center">
                                        <img id="img-preview" src="{{ asset($val->file) }}" class="img-responsive rounded-circle" style="height: 90px; width: 110px;" alt="foto anggota">
                                    </div>
                                </td>

                                <td class="text-center">
                                    {{ ucfirst($val->status_aktif)}}

                                     
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
        <div class="col-md-12 col-lg-4">
            <div class="mb-30 p-30 card-view">
                <h4 class="p-title"><b>KATEGORI BERITA</b></h4>
                <div class="sided-80x mb-20">
                    <ul>
                        @foreach($jenisBeritaObj as $jenis)
                        <h5><a href="{{ route('berall',['ket'=>'kategori','ket2'=>$jenis->id.'-'.str_slug($jenis->jenis)])}}">{{ $jenis->jenis }} </a></h5>
                        <hr>
                        @endforeach
                    </ul>                          
                </div><!-- sided-80x -->
            </div>
            <div class="mb-30 p-30 card-view">
                <h4 class="p-title"><b>RATING TERTINGGI</b></h4>
                @foreach($putryObj as $sacry)
                @if($sacry->media_berita()->exists() && file_exists('./'.$sacry->media_berita('jenis','=','foto')->first()->file))
                <div class="sided-80x mb-20">
                    <div class="s-left">
                        <img src="{{ asset($sacry->media_berita->first()->file)}}" alt="Rating berita veky">
                    </div>
                    <div class="s-right">
                        <h5><a href="{{ route('deber',['id'=>$sacry->id,'slug'=>str_slug($sacry->judul)]) }}">
                            <b>{{ ucwords($sacry->judul)}}</b></a>
                        </h5>
                        <i class="mr-5 font-12 ion-clock"></i>{{ $sacry->updated_at->format('d M Y') }}  
                        <span class="price pull-rigth">
                            @for($n=1; $n<= $sacry->rating; $n++)
                            <i class="fa fa-star"></i>
                            @endfor
                            @for($n=4; $n>= $sacry->rating; $n--)
                            <i class="fa fa-star-o"></i>
                            @endfor
                        </span>
                    </div>
                </div>
                @else
                <div class="sided-80x mb-20">
                    <div class="s-left">
                        <img src="{{ asset('media/veky.png')}}" alt="Rating berita veky">
                    </div>
                    <div class="s-right">
                        <h5><a href="{{ route('deber',['id'=>$sacry->id,'slug'=>str_slug($sacry->judul)]) }}"> <b>{{ ucwords($sacry->judul)}}</b></a></h5>
                        <i class="mr-5 font-12 ion-clock"></i>{{ $sacry->updated_at->format('d M Y') }}  
                        <span class="price pull-rigth">
                            @for($n=1; $n<= $sacry->rating; $n++)
                            <i class="fa fa-star"></i>
                            @endfor
                            @for($n=4; $n>= $sacry->rating; $n--)
                            <i class="fa fa-star-o"></i>
                            @endfor
                        </span>
                    </div>
                </div> 
                @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
@stop

 
 