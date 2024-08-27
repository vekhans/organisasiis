@extends('layouts.dasar.adhome')

@section('content')
<div class="card-body">     
    <div class="card-header">
        <div class="card-header">{{ __('Dashboard') }}</div>
    </div>
    <br>    
    <div class="row align-items-center justify-content-center">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> <i class="fas fa-users"></i>  Jumlah Anggota {{$jumlah_anggota}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('anggota.index') }}"> View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Cabang {{$jumlah_cabang}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cabang.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Anggota Per Cabang
                </div>
                <!-- 
                <h1>Highcharts in Laravel Example</h1> -->
    <div id="container"></div>
            </div>
        </div>
        <!-- <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div> -->
    </div> 
</div>
@endsection
@section('script')
       <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
var categories = <?php echo json_encode($categories)?>;
var series = <?php echo json_encode($series)?>;
    Highcharts.chart('container', {
        title: {
            text: 'Jumlah Anggota Per Cabang'
        }, 
        xAxis: {
            categories:   categories
        },
        yAxis: {
            title: {
                text: 'Jumlah Anggota'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Anggota',
            data: series
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
      
@endsection


