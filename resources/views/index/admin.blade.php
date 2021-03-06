@extends('layout')

@section('judul')
    SITASI
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 order-2 order-lg-1">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-bar-chart-2 text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{ $jum[0] }}</h2>
                            <p class="mb-0">Total Penelitian</p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-1"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">{{ $jum[1] }}</h2>
                            <p class="mb-0">Total Pengabdian</p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-2"></div>
                        </div>
                    </div>
                </div>
                <canvas id="chart-penelitian" height="0"></canvas>
                <canvas id="chart-pengabdian" height="0"></canvas>
                
                
                {{-- <div class="col-12">
                    <canvas  id="chart-penelitian"></canvas>
                </div> --}}
                
            </div>
        </div>

        <div class="col-md-6 order-1 order-lg-2">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Informasi Pribadi</h3>
        
                      <div class="card-tools">
                        <a href="#" class="btn btn-success">Ubah Profil</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-text">
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Foto Profil</dt>
                                <dd class="col-sm-9">
                                    @isset ($composerUser->profile_photo_path)
                                        <img src="{{ asset($composerUser->profile_photo_path) }}" class="img-fluid" alt="Profile picture">
                                    @else
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" class="img-fluid" alt="Profile picture">
                                    @endisset
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Nama</dt>
                                <dd class="col-sm-9">{{ $composerUser->nama }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">NIDN</dt>
                                <dd class="col-sm-9">{{ $composerUser->nidn }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Email</dt>
                                <dd class="col-sm-9"><a href="mailto:{{ $composerUser->email }}">{{ $composerUser->email }}</a></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Link Google Scholar</dt>
                                <dd class="col-sm-9">
                                    @isset ($composerUser->google_scholar_id)
                                        <a href="https://scholar.google.com/citations?user={{ $composerUser->google_scholar_id }}&hl=id">{{ $composerUser->google_scholar_id }}</a>
                                    @else
                                        <a href="{{ route('profil.index') }}" class="text-danger">Ubah Profil Untuk Setting Link Google Scholar</a>
                                    @endisset
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (left) -->
              </div>
              <!-- /.row -->
        </div>
    </div>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title mb-0">Review Usulan</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            <!-- general form elements -->
            @if(count($penelitian))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Penelitian</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.usulan') }}" class="btn btn-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="penelitianTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Reviewer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($penelitian as $item)
                                            <tr>
                                                <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                                <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                                <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Reviewer</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Usulan Penelitian</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content">
                        <div class="card-body text-center">
                            <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                            <h4 class="card-title text-white">Tidak ada data</h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            <!-- /.card -->
  
            <!-- skema pengabdian -->
            <!-- general form elements -->
            @if(count($pengabdian))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Pengabdian</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.usulan') }}" class="btn btn-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="pengabdianTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Reviewer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengabdian as $item)
                                        <tr>
                                            <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                            <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                            <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Reviewer</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Usulan Pengabdian</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content">
                        <div class="card-body text-center">
                            <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                            <h4 class="card-title text-white">Tidak ada data</h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->

    <!-- modal -->
    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="label">Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Judul</dt>
                            <dd class="col-sm-8" id="judul">-</dd>
                        </dl>
                        <dl class="row mb-0">
                            <dt class="col-sm-4 text-md-right">Tim Peneliti</dt>
                            <dd class="col-sm-8 ml-1 ml-md-0">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Ketua</dt>
                                    <dd class="col-sm-9" id="ketua">-</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-3 mb-0 text-md-right">Anggota</dt>
                                    <dd class="col-sm-9 mb-0">
                                        <ul class="list-unstyled" id="anggota">-</ul>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Skema</dt>
                            <dd class="col-sm-8" id="skema">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                            <dd class="col-sm-8" id="tahun-usulan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Penelitian</dt>
                            <dd class="col-sm-8" id="tahun-pelaksanaan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                            <dd class="col-sm-8" id="jenis">Penelitian</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Proposal</dt>
                            <dd class="col-sm-8" id="berkas-proposal">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Kemajuan</dt>
                            <dd class="col-sm-8" id="berkas-laporan-kemajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Akhir</dt>
                            <dd class="col-sm-8" id="berkas-laporan-akhir">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Anggaran</dt>
                            <dd class="col-sm-8" id="berkas-laporan-anggaran">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Belanja</dt>
                            <dd class="col-sm-8" id="berkas-laporan-belanja">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Publikasi</dt>
                            <dd class="col-sm-8" id="berkas-laporan-publikasi">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Link Publikasi/Google Scholar</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script>
        $(window).on("load", function() {

        var $primary = '#7367F0';
        var $success = '#28C76F';
        var $danger = '#EA5455';
        var $warning = '#FF9F43';
        var $primary_light = '#A9A2F6';
        var $success_light = '#55DD92';
        var $warning_light = '#ffc085';

        // Subscribed Gained Chart
        // ----------------------------------

        var penelitianChartoptions = {
            chart: {
                height: 100,
                type: 'area',
                toolbar:{
                    show: false,
                },
                sparkline: {
                    enabled: true
                },
                grid: {
                    show: true,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
            },
            colors: [$success],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2.5
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 0.9,
                    opacityFrom: 0.7,
                    opacityTo: 0.5,
                    stops: [0, 80, 100]
                }
            },
            series: [{
                name: 'Penelitian',
                data: [
                    @foreach($tahun_penelitian as $tp)
                        [{{ $tp->tahun_pelaksanaan }},{{ $tp->jumlah }}],
                    @endforeach
                ]
            }],

            xaxis: {
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: true,
                }
            },
            yaxis: [{
                y: 0,
                offsetX: 0,
                offsetY: 0,
                padding: { left: 0, right: 0 },
            }],
            tooltip: {
                x: { show: true }
            },
        }

        var penelitianChart = new ApexCharts(
            document.querySelector("#line-area-chart-1"),
            penelitianChartoptions
        );

        penelitianChart.render();

        // Pengabdian Chart
        // ----------------------------------

        var pengabdianChartoptions = {
            chart: {
                height: 100,
                type: 'area',
                toolbar:{
                    show: false,
                },
                sparkline: {
                    enabled: true
                },
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
            },
            colors: [$primary],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2.5
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 0.9,
                    opacityFrom: 0.7,
                    opacityTo: 0.5,
                    stops: [0, 80, 100]
                }
            },
            series: [{
                name: 'Pengabdian',
                data: [
                    @foreach($tahun_pengabdian as $tp)
                        [{{ $tp->tahun_pelaksanaan }},{{ $tp->jumlah }}],
                    @endforeach
                ]
            }],

            xaxis: {
                labels: {
                show: false,
                },
                axisBorder: {
                show: false,
                }
            },
            yaxis: [{
                y: 0,
                offsetX: 0,
                offsetY: 0,
                padding: { left: 0, right: 0 },
            }],
            tooltip: {
                x: { show: true }
            },
        }

        var pengabdianChart = new ApexCharts(
            document.querySelector("#line-area-chart-2"),
            pengabdianChartoptions
        );

        pengabdianChart.render();
    });
    
    $(document).ready(function () {
        $(document).on('click', '#penelitianTable tbody tr td a', function(e) {
            var id = $(this).attr('data-value');
            console.log(id)
            $.get( "/usulan/" + id, function( data ) {
                console.log(JSON.parse(data));
                var d = JSON.parse(data);
                $('#label').text('Detail Penelitian');
                $('#jenis').text('Penelitian');
                $('#judul').html(d.judul);
                $('#ketua').html(d.ketua);
                for (var i = 0; i < d.anggota.length; i++) {
                    $('#anggota').html('<li>'+d.anggota[i].dosen_nama+'</li>');
                }
                $('#skema').html(d.skema_usulan.nama);
                $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                $('#berkas-proposal').html('-');
                $('#berkas-laporan-kemajuan').html('-');
                $('#berkas-laporan-akhir').html('-');
                $('#berkas-laporan-anggaran').html('-');
                for (var i = 0; i < d.berkas.length; i++) {
                    if (d.berkas[i]['jenis_berkas_id'] == 1) {
                        $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Proposal</a>')
                    } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                        $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Kemajuan</a>')
                    } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                        $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Akhir</a>')
                    } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                        $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Anggaran</a>')
                    }
                }
            });
        });

        $(document).on('click', '#pengabdianTable tbody tr td a', function(e) {
            var id = $(this).attr('data-value');
            $.get( "/usulan/" + id, function( data ) {
                console.log(JSON.parse(data));
                var d = JSON.parse(data);  
                $('#label').text('Detail Pengabdian');
                $('#jenis').text('Pengabdian');
                $('#judul').html(d.judul);
                $('#ketua').html(d.ketua);
                if(d.anggota.length > 0){
                    $('#anggota').html('');
                    for (var i = 0; i < d.anggota.length; i++) {
                        $('#anggota').append('<li>'+d.anggota[i].dosen_nama+'</li>');
                    }
                }
                $('#skema').html(d.skema_usulan.nama);
                $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                $('#berkas-proposal').html('-');
                $('#berkas-laporan-kemajuan').html('-');
                $('#berkas-laporan-akhir').html('-');
                $('#berkas-laporan-anggaran').html('-');
                for (var i = 0; i < d.berkas.html; i++) {
                    if (d.berkas[i]['jenis_berkas_id'] == 1) {
                        $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Proposal</a>')
                    } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                        $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Kemajuan</a>')
                    } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                        $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Akhir</a>')
                    } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                        $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Anggaran</a>')
                    }
                }
            });
        });
    })
    </script>
@endsection