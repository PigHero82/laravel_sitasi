@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
@endsection

@section('judul')
    Review
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ session('success') }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ session('danger') }}
        </div>
    @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            @if(count($penelitian))
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
                                            @if ($item->nilai == 1)
                                                <h3 class="badge badge-md badge-pill badge-success"><i class="feather icon-check"></i> Selesai</h3>
                                            @else
                                                <h3 class="badge badge-md badge-pill badge-warning"><i class="feather icon-clock"></i> Menunggu</h3>
                                            @endif
                                        </td>
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
            @endif

            <!-- skema pengabdian -->
            @if(count($pengabdian))
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
                                        <td>
                                            @if ($item->nilai == 1)
                                                <h3 class="badge badge-md badge-pill badge-success"><i class="feather icon-check"></i> Selesai</h3>
                                            @else
                                                <h3 class="badge badge-md badge-pill badge-warning"><i class="feather icon-clock"></i> Menunggu</h3>
                                            @endif
                                        </td>
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
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Rencana Anggaran</dt>
                                    <dd class="col-sm-8" id="anggaran">-</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Rencana Luaran</dt>
                                    <dd class="col-sm-8" id="luaran">-</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Proposal</dt>
                                    <dd class="col-sm-8" id="berkas-proposal">-</dd>
                                </dl>
                                <hr class="d-none"/>
                                <div class="d-none" id="nilai-modal"></div>
                                <form action="#" method="POST" id="modal-form" onsubmit="return confirm('Apakah Anda yakin? Nilai tidak dapat diubah kembali');">
                                    @csrf
                                    @method('PATCH')
                                    <h5>Penilaian</h5>
                                    <div id="nilai">
                                        
                                    </div>
                                    
                                    <dl class="row mb-0 d-none" id="komentar">
                                        <dt class="col-sm-4 text-md-left">Komentar</dt>
                                        <dd class="col-sm-8">
                                            <fieldset class="form-group">
                                                <input type="hidden" name="penilaian_tahap_id" id="tahapId" required>
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
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-penelitian').DataTable({
            responsive: true
        });

        $('#table-pengabdian').DataTable({
            responsive: true
        });

        $(document).ready( function () {
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
            
            $(document).on('click', '#table-penelitian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    var linkrab = ' <a href="{{ url('reviewer/rab/') }}/' + d.id +'" target="_blank"> Lihat anggaran </a>';
                    $('#label').text('Detail Penelitian');
                    $('#jenis').text('Penelitian');
                    $('#judul').html(d.judul);
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#anggaran').html(formatRupiah(''+d.usulan_dana, 'Rp. ') + linkrab);
                    $('#luaran').empty();
                    for(var l = 0; l < d.luaran.length; l++){
                      
                        $('#luaran').append('<li>'+d.luaran[l].nama_luaran + ' <span class="text-info">(' + d.luaran[l].nama_target + ')</span><br/></li>');
                      
                    }
      
                    
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

                    if (d.nilai == 1) {
                        $('#modal-form').hide();
                        $('hr').removeClass('d-none');
                        $('#nilai-modal').removeClass('d-none');
                        $('#nilai-modal').empty();

                        for (let i = 0; i < 5; i++) {
                            $('#nilai-modal').append('<dl class="row"><dt class="col-sm-4 text-md-right">Nilai ' + d.penilaian[i].nama + '</dt><dd class="col-sm-8">' + d.penilaian[i].nilai + '</dd></dl>');
                        }
                        $('#nilai-modal').append('<dl class="row"><dt class="col-sm-4 text-md-left">Komentar</dt><dd class="col-sm-8">' + d.komentar[0].komentar + '</dd></dl>');
                    } else {
                        
                        $('#modal-form').attr('action', '/reviewer/review/' + id);
                        $('#nilai').empty();
                        $('#modal-form').show();
                        $.get('/reviewer/review/indikator/1', function(data) {
                            console.log(JSON.parse(data));
                            var d = JSON.parse(data);
                            $('hr').removeClass('d-none');
                            $('#nilai-modal').empty();
                            for (var i = 0; i < d.length; i++) {
                                $('#nilai').append('<dl class="row mb-0"><dt class="col-sm-4 text-md-left">' + d[i].nama + '<br/><small class="text-muted">'+d[i].deskripsi+' <br/><br/></small></dt><dd class="col-sm-8"><div class="form-group"><input type="number" class="form-control" name="nilai[' + d[i].id + ']" placeholder="' + d[i].nama + '" min="2" max="5" aria-describedby="nilai-'+d[i].id+'-block" required><small id="nilai-'+d[i].id+'-block" class="form-text text-danger">*2 (kurang jelas/sesuai) – 5 (sangat jelas/sesuai) <br/></small></div></dd></dl>')
                            }
                            $('#tahapId').val(1);
                            $('#komentar').removeClass('d-none');
                        })
                    }
                });
            });

            $(document).on('click', '#table-pengabdian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    var linkrab = ' <a href="{{ url('reviewer/rab/') }}/' + d.id +'" target="_blank"> Lihat anggaran </a>';
                    $('#label').text('Detail Pengabdian');
                    $('#jenis').text('Pengabdian');
                    $('#judul').html(d.judul);
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#anggaran').html(formatRupiah(''+d.usulan_dana, 'Rp. ') + linkrab);
                    $('#luaran').empty();
                    for(var l = 0; l < d.luaran.length; l++){
                      
                        $('#luaran').append('<li>'+d.luaran[l].nama_luaran + ' <span class="text-info">(' + d.luaran[l].nama_target + ')</span><br/></li>');
                      
                    }
                    
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

                    if (d.nilai == 1) {
                        $('#modal-form').hide();
                        $('hr').removeClass('d-none');
                        $('#nilai-modal').removeClass('d-none');
                        $('#nilai-modal').empty();
                        for (let i = 0; i < 5; i++) {
                            $('#nilai-modal').append('<dl class="row"><dt class="col-sm-4 text-md-right">Nilai ' + d.penilaian[i].nama + '</dt><dd class="col-sm-8">' + d.penilaian[i].nilai + '</dd></dl>');
                        }
                        $('#nilai-modal').append('<dl class="row"><dt class="col-sm-4 text-md-left">Komentar</dt><dd class="col-sm-8">' + d.komentar[0].komentar + '</dd></dl>');
                    } else {
                        $('#nilai').empty();
                        $('#modal-form').attr('action', '/reviewer/review/' + id);
                        $('#modal-form').show();
                        $.get('/reviewer/review/indikator/2', function(data) {
                            console.log(JSON.parse(data));
                            var d = JSON.parse(data);
                            $('hr').removeClass('d-none');
                            $('#nilai-modal').empty();
                            for (var i = 0; i < d.length; i++) {
                                $('#nilai').append('<dl class="row mb-0"><dt class="col-sm-4 text-md-left">' + d[i].nama + '<br/><small class="text-muted">'+d[i].deskripsi+' <br/><br/></small></dt><dd class="col-sm-8"><div class="form-group"><input type="number" class="form-control" name="nilai[' + d[i].id + ']" placeholder="' + d[i].nama + '" min="2" max="5" aria-describedby="nilai-'+d[i].id+'-block" required><small id="nilai-'+d[i].id+'-block" class="form-text text-danger">*2 (kurang jelas/sesuai) – 5 (sangat jelas/sesuai) <br/></small></div></dd></dl>');
                            }
                            $('#tahapId').val(1);
                            $('#komentar').removeClass('d-none');
                        })
                    }
                })
            });
        });
    </script>
@endsection