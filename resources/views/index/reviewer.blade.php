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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $unreviewed }}</h2>
                        <p>Jumlah Penelitian dan Pengabdian yang harus direview</p>
                    </div>
                    <div class="avatar bg-rgba-info p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $reviewed }}</h2>
                        <p>Jumlah yang telah direview</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
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
            @isset($penelitian)
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Usulan Penelitian</h3>

                    <div class="card-tools">
                        <a href="{{ route('reviewer.review.index') }}" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                        <table id="table-penelitian" class="table zero-configuration table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th style="width: 50%">Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penelitian as $item)
                                    <tr>
                                        {{-- <td>
                                            <div class="progress progress-bar-success progress-lg mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" style="width:20%"></div>
                                            </div>
                                            <div class="badge badge-pill badge-glow badge-success block">20% | Lengkap</div>
                                        </td> --}}
                                        <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                        <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                        <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                        <td>
                                            <div class="badge badge-pill badge-md badge-warning">
                                                <i class="feather icon-clock"></i> Belum direview
                                            </div>
                                        </td>
                                        {{-- <td><h3 class="text-danger"><i class="feather icon-x"></i></h3></td> --}}
                                        {{-- <td><h3 class="text-warning"><i class="feather icon-clock"></i></h3></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th>Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.table -->
            @else
                <!-- empty table -->
                <div class="card bg-danger text-white">
                <div class="card-header">
                    <h3 class="card-title text-white">Usulan Penelitian</h3>

                    {{-- <div class="card-tools">
                        <a href="#" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div> --}}
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
                <!-- /.empty table -->
            @endisset

            <!-- skema pengabdian -->
            @isset($pengabdian)
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Usulan Pengabdian</h3>

                    <div class="card-tools">
                        <a href="{{ route('reviewer.review.index') }}" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                        <table id="table-pengabdian" class="table zero-configuration table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th style="width: 50%">Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengabdian as $item)
                                    <tr>
                                        {{-- <td>
                                            <div class="progress progress-bar-success progress-lg mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" style="width:20%"></div>
                                            </div>
                                            <div class="badge badge-pill badge-glow badge-success block">20% | Lengkap</div>
                                        </td> --}}
                                        <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                        <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                        <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                        <td><h3 class="text-warning"><i class="feather icon-clock"></i></h3></td>
                                        {{-- <td><h3 class="text-danger"><i class="feather icon-x"></i></h3></td> --}}
                                        {{-- <td><h3 class="text-warning"><i class="feather icon-clock"></i></h3></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th>Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.table -->
            @else
                <!-- empty table -->
                <div class="card bg-danger text-white">
                <div class="card-header">
                    <h3 class="card-title text-white">Usulan Penelitian</h3>

                    {{-- <div class="card-tools">
                        <a href="#" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div> --}}
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
                <!-- /.empty table -->
            @endisset
        
            <!-- modal -->
            <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="label">Detail Usulan</h4>
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
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Skema</dt>
                                    <dd class="col-sm-8" id="skema">-</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                                    <dd class="col-sm-8" id="tahun-usulan">-</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Tahun Pelaksanaan</dt>
                                    <dd class="col-sm-8" id="tahun-pelaksanaan"></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                                    <dd class="col-sm-8" id="jenis">-</dd>
                                </dl>
                                {{-- <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Progress</dt>
                                    <dd class="col-sm-8">
                                        <div class="progress progress-bar-success progress-lg mb-0">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" style="width:20%"></div>
                                        </div>
                                        <div class="badge badge-pill badge-glow badge-success block">20% | Lengkap</div>
                                    </dd>
                                </dl> --}}
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Proposal</dt>
                                    <dd class="col-sm-8" id="berkas-proposal">-</dd>
                                </dl>
                                <hr/>
                                <form action="#" method="POST" id="modal-form">
                                    @csrf
                                    @method('PATCH')
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 text-md-right">Nilai</dt>
                                        <dd class="col-sm-8">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="nilai" placeholder="Nilai" min="1" max="100" required>
                                            </div>
                                        </dd>
                                    </dl>
        
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 text-md-right">Komentar</dt>
                                        <dd class="col-sm-8">
                                            <fieldset class="form-group">
                                                <textarea class="form-control" name="komentar" id="basicTextarea" rows="3" placeholder="Komentar" required></textarea>
                                            </fieldset>
                                        </dd>
                                    </dl>
        
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary float-right">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(document).ready( function () {
            $(document).on('click', '#table-penelitian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#label').text('Detail Penelitian');
                    $('#jenis').text('Penelitian');
                    $('#judul').html(d.judul);
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#modal-form').attr('action', '/reviewer/review/' + id);
                    for (var i = 0; i < d.berkas.length; i++) {
                        if (d.berkas[i]['jenis_berkas_id'] == 1) {
                            $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Proposal</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                            $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Kemajuan</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                            $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Akhir</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                            $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Anggaran</a>')
                        }
                    }
                });
            });

            $(document).on('click', '#table-pengabdian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#label').text('Detail Pengabdian');
                    $('#jenis').text('Pengabdian');
                    $('#judul').html(d.judul);
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#modal-form').attr('action', '/reviewer/review/' + id);
                    for (var i = 0; i < d.berkas.length; i++) {
                        if (d.berkas[i]['jenis_berkas_id'] == 1) {
                            $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Proposal</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                            $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Kemajuan</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                            $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Akhir</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                            $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Anggaran</a>')
                        }
                    }
                });
            });
        });
    </script>
@endsection