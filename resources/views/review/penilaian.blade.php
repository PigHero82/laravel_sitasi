@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Penilaian
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
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            @if (count($penelitian))
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Penelitian</h3>

                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-penelitian" class="table zero-configuration table-striped" style="width:100%">
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
                                                    @if ($item->step == 9)
                                                        <h3 class="text-warning"><i class="feather icon-clock"></i></h3>
                                                    @elseif ($item->step == 10)
                                                        <h3 class="text-danger"><i class="feather icon-x"></i></h3>
                                                    @elseif ($item->step == 11)
                                                        <h3 class="text-success"><i class="feather icon-check"></i></h3>
                                                    @endif
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
            @endif

            <!-- skema pengabdian -->
            @if (count($pengabdian))
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Pengabdian</h3>

                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-pengabdian" class="table zero-configuration table-striped" style="width:100%">
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
            @endif
        
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
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Nilai</dt>
                                    <dd class="col-sm-8" id="nilai">-</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Komentar</dt>
                                    <dd class="col-sm-8" id="komentar">-</dd>
                                </dl>
                                <form action="#" method="POST" id="modal-form">
                                    @csrf
                                    @method('PATCH')
        
                                    <div class="modal-footer">
                                        <div class="float-right">
                                            <button type="submit" name="status" value="10" class="btn btn-danger">Tidak Setuju</button>
                                            <button type="submit" name="status" value="11" class="btn btn-primary">Setuju</button>
                                        </div>
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
                    $('#nilai').text(d.nilai);
                    $('#komentar').text(d.komentar);
                    $('#modal-form').attr('action', '/admin/review/penilaian/' + id);
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