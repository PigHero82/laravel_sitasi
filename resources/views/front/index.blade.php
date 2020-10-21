@extends('front.layout')

@section('judul')
    SITASI
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-1 order-lg-2 mb-md-0 mb-3" style="margin-left: 0%">
                <div class="col-md-12 text-center" style="padding-left: 0px; padding-right: 0px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{ count($penelitian) }}</h2>
                            <p class="mb-0 line-ellipsis">Total Penelitian</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center" style="padding-left: 0px; padding-right: 0px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{ count($pengabdian) }}</h2>
                            <p class="mb-0 line-ellipsis">Total Pengabdian</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 order-2 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Pengumuman</h3>
                        <table class="table" id="table-pengumuman">
                            <thead>
                                <tr>
                                    <th>
                                    Tanggal 
                                    </th>
                                    <th>
                                        Pengumuman
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengumuman as $peng)
                                <tr>
                                    <td><a href="">
                                        {{ $peng->created_at->format('d-m-Y') }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $peng->judul }}
                                    </td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2" style="text-align: center;">{{ $pengumuman->links() }}  </td>
                                </tr>
                            </tbody>
                        </table> 
                         
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body row">
                    <div class="col-md-6">
                    <canvas  id="chart-penelitian"></canvas> 
                    </div>
                    <div class="col-md-6">
                    <canvas  id="chart-pengabdian"></canvas>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var label = [
        @foreach($tahun_penelitian as $tp)
            '{{ $tp->tahun_pelaksanaan }}',
        @endforeach
        ];
        var data = [
        @foreach($tahun_penelitian as $tp)
            '{{ $tp->jumlah }}',
        @endforeach
        ]
        var ctx = document.getElementById('chart-penelitian').getContext('2d');
        var chartPenelitian = new Chart(ctx, {
            type:'line',
            data:{
                labels: label,
                datasets: [{
                    label:'Perkembangan penelitian STIKI',
                    data: data,
                    backgroundColor: 'blue',
                    borderColor: 'lightblue'
                }]
            },
            options: {
                elements:{
                    line:{
                        fill:false,
                        lineTension: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var label1 = [
        @foreach($tahun_pengabdian as $tp)
            '{{ $tp->tahun_pelaksanaan }}',
        @endforeach
        ];
        var data1 = [
        @foreach($tahun_pengabdian as $tp)
            '{{ $tp->jumlah }}',
        @endforeach
        ]
        var ctx1 = document.getElementById('chart-pengabdian').getContext('2d');
        var chartPenelitian = new Chart(ctx1, {
            type:'line',
            data:{
                labels: label1,
                datasets: [{
                    label:'Perkembangan penelitian STIKI',
                    data: data1,
                    backgroundColor: 'red',
                    borderColor: 'pink'
                }]
            },
            options: {
                elements:{
                    line:{
                        fill:false,
                        lineTension: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection