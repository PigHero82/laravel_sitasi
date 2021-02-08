@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Pembagian Reviewer
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
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usulan Penelitian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                <a href="{{ route('admin.review.random-reviewer', 1) }}" class="btn btn-outline-success"><i class="fas fa-sync-alt"></i> Acak Reviewer</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="penelitianTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50%">Judul</th>
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
                                    <td>
                                        @isset($item->reviewer)
                                            {{ $item->reviewer->nama }}
                                        @else
                                            -
                                        @endisset
                                    </td>
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
          <!-- /.card -->

          <!-- skema pengabdian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usulan Pengabdian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                <a href="#" class="btn btn-outline-success"><i class="fas fa-sync-alt"></i> Acak Reviewer</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="pengabdianTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50%">Judul</th>
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
                                    <td>
                                        @isset($item->reviewer)
                                            {{ $item->reviewer->nama }}
                                        @else
                                            -
                                        @endisset
                                    </td>
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
                        <h4 class="modal-title" id="myModalLabel33">Detail Usulan</h4>
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
                        <hr/>
                        <form action="#" method="POST" id="form">
                            @csrf
                            @method('PATCH')
                            <dl class="row mb-0">
                                <dt class="col-sm-4 text-md-right">Reviewer</dt>
                                <dd class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="dosen_id" id="reviewer" required>
                                            <option value="" hidden>--Pilih Reviewer</option>
                                            @foreach ($reviewer as $item)
                                                <option value="{{ $item->nidn }}">{{ $item->nama }} - {{ $item->nidn }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </dd>
                            </dl>

                            <div class="modal-footer justify-content-between">
                                {{-- <button type="button" class="btn btn-success" data-dismiss="modal">Pilih Acak</button> --}}
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <!-- BEGIN: Datatables JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <!-- END: Datatables JS-->
    
    <script>
        $(document).ready( function () {
            $('#penelitianTable').DataTable();
            $('#pengabdianTable').DataTable();
        });

        $(document).ready( function () {
            $(document).on('click', '#penelitianTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#form').attr('action', '/admin/review/store/' + id);
                    $('#label').text('Detail Penelitian');
                    $('#jenis').text('Penelitian');
                    $('#judul').text(d.judul);
                    $('#ketua').text(d.ketua);
                    for (var i = 0; i < d.anggota.length; i++) {
                        $('#anggota').html('<li>'+d.anggota[i].dosen_nama+'</li>');
                    }
                    if (d.reviewer == null) {
                        $('#reviewer').val('-');
                    } else {
                        $('#reviewer').val(d.reviewer.nidn);
                    }
                    $('#skema').text(d.skema_usulan.nama);
                    $('#tahun-usulan').text(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').text(d.skema_usulan.tahun_pelaksanaan);
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

            $(document).on('click', '#pengabdianTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#label').text('Detail Pengabdian');
                    $('#jenis').text('Pengabdian');
                    $('#judul').html(d.judul);
                    $('#ketua').html(d.ketua);
                    for (var i = 0; i < d.anggota.length; i++) {
                        $('#anggota').html('<li>'+d.anggota[i].dosen_nama+'</li>');
                    }
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
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